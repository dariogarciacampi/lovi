<?php session_start();

	 if(isset($_POST["login"]) OR ($_POST["password"]))
 {
						include("conexion.php");
		            	$result = mysqli_query($conectado,"select PassCome, NombCome, EstaCome, CateCome, CodiCome from comercio WHERE MailCome = '".$_POST["login"]."'");
		            	if(mysqli_num_rows($result) > 0){
		            		$dato = mysqli_fetch_array($result);
		            		if ($dato["PassCome"] == $_POST["password"]){
		            			if (($dato["EstaCome"] == "No Activo") OR ($dato["EstaCome"] == "Solicitado")) {
		            				echo("Usted no se encuentra autorizado");
		            			} else {
		            			$_SESSION["user"] = $_POST["login"] ;
		            			$_SESSION["empresa"] = $dato["NombCome"] ;
		            			$_SESSION["tipo"] = $dato["CateCome"] ;
		            			$_SESSION["estado"] = $dato["EstaCome"] ;
		            			$_SESSION["codigou"] = $dato["CodiCome"] ;
		            			echo 1;
		            			exit();
		            		}
		            		}else {
		            			echo ("El password ingresado es incorrecto");
		            		}
		            	}else {
		            		echo("El usuario ingresado es incorrecto");
		            	}
}



?>