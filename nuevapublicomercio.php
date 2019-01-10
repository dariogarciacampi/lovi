<?php session_start();
	
	

	 	
	 	$titulo = $_POST["titulo"];
	 	$titulo= str_replace('"', '', $titulo); 
	 	$titulo= str_replace("'", "", $titulo); 
	 	$cuerpo = $_POST['cuerpo'];
	 	$cuerpo= str_replace('"', '', $cuerpo); 
	 	$cuerpo= str_replace("'", "", $cuerpo); 
	 	$precio = $_POST["precio"];
	 	$precio= str_replace(',', '', $precio); 
	 	$precio = number_format($precio, 2, '.', '');

	 	$precio1 = $_POST["precio1"];
	 	$precio1= str_replace(',', '', $precio1); 
	 	$precio1 = number_format($precio1, 2, '.', '');
	 	
	 	$precio3 = $_POST["precio3"];
	 	$precio3= str_replace(',', '', $precio3); 
	 	$precio3 = number_format($precio3, 2, '.', '');
	 	
	 	$precio6 = $_POST["precio6"];
	 	$precio6= str_replace(',', '', $precio6); 
	 	$precio6 = number_format($precio6, 2, '.', '');
	 	
	 	$precio12 = $_POST["precio12"];
	 	$precio12= str_replace(',', '', $precio12); 
	 	$precio12 = number_format($precio12, 2, '.', '');
	 	
	 	$precio18 = $_POST["precio18"];
	 	$precio18= str_replace(',', '', $precio18); 
	 	$precio18 = number_format($precio18, 2, '.', '');
	 	
	 	$precio24 = $_POST["precio24"];
	 	$precio24= str_replace(',', '', $precio24); 
	 	$precio24 = number_format($precio24, 2, '.', '');

	 	$destacadostring = $_POST["destacadostring"];
	 	$codigou = $_SESSION["codigou"];
	 	
	 	$fecha = date("Y-m-d") ;
	 	if ($destacadostring == "true") {
	 		$estadoclasi = "Oferta";
	 	}
	 		else{
	 		$estadoclasi = "Publicado";
	 	}

	 	include("conexion.php"); 

	 	$result = mysqli_query($conectado,"INSERT INTO anuncio (CodiCome, FechAnun, TituAnun, CuerAnun, PrecAnun, EstaAnun, 1CuoAnun, 3CuoAnun, 6CuoAnun, 12CuoAnun, 18CuoAnun, 24CuoAnun) values ('".$codigou."', '".$fecha."','".$titulo."','".$cuerpo."','".$precio."','".$estadoclasi."','".$precio1."','".$precio3."','".$precio6."','".$precio12."','".$precio18."','".$precio24."')");

	 	

	 	$ultimopublicado =  mysqli_query($conectado,"SELECT CodiAnun FROM anuncio ORDER BY CodiAnun DESC LIMIT 1");
	 	$ultimo = mysqli_fetch_array($ultimopublicado);
	 	$ultimoclasi = $ultimo["CodiAnun"];

	 	
	 	if (!empty($_FILES["img1"]["name"])) {
	 		$imagen = $_FILES["img1"]["name"];
    	$nombre_archivo = rand(100,9999).$imagen;
    	$ruta = $_FILES["img1"]["tmp_name"];
	 	$destino = "anuncios/".$nombre_archivo ;
	 	move_uploaded_file($ruta, $destino);
	 	
	 	$resulta = mysqli_query($conectado,"INSERT INTO imagenanun (NombIman, CodiAnun) values ('".$destino."', '".$ultimoclasi."')");
	 	}
	 	
	 	if (!empty($_FILES["img2"]["name"])) {
	 		$imagen = $_FILES["img2"]["name"];
    	$nombre_archivo = rand(100,9999).$imagen;
    	$ruta = $_FILES["img2"]["tmp_name"];
	 	$destino = "anuncios/".$nombre_archivo ;
	 	move_uploaded_file($ruta, $destino);
	 	$resulta = mysqli_query($conectado,"INSERT INTO imagenanun (NombIman, CodiAnun) values ('".$destino."', '".$ultimoclasi."')");
	 	}
	 	if (!empty($_FILES["img3"]["name"])) {
	 		$imagen = $_FILES["img3"]["name"];
    	$nombre_archivo = rand(100,9999).$imagen;
    	$ruta = $_FILES["img3"]["tmp_name"];
	 	$destino = "anuncios/".$nombre_archivo ;
	 	move_uploaded_file($ruta, $destino);
	 	$resulta = mysqli_query($conectado,"INSERT INTO imagenanun (NombIman, CodiAnun) values ('".$destino."', '".$ultimoclasi."')");
	 	}
	 	if (!empty($_FILES["img4"]["name"])) {
	 		$imagen = $_FILES["img4"]["name"];
    	$nombre_archivo = rand(100,9999).$imagen;
    	$ruta = $_FILES["img4"]["tmp_name"];
	 	$destino = "anuncios/".$nombre_archivo ;
	 	move_uploaded_file($ruta, $destino);
	 	$resulta = mysqli_query($conectado,"INSERT INTO imagenanun (NombIman, CodiAnun) values ('".$destino."', '".$ultimoclasi."')");
	 	}
	 	if (!empty($_FILES["img5"]["name"])) {
	 		$imagen = $_FILES["img5"]["name"];
    	$nombre_archivo = rand(100,9999).$imagen;
    	$ruta = $_FILES["img5"]["tmp_name"];
	 	$destino = "anuncios/".$nombre_archivo ;
	 	move_uploaded_file($ruta, $destino);
	 	$resulta = mysqli_query($conectado,"INSERT INTO imagenanun (NombIman, CodiAnun) values ('".$destino."', '".$ultimoclasi."')");
	 	}

	 	if (empty($_FILES["img1"]["name"]) AND empty($_FILES["img2"]["name"]) AND empty($_FILES["img3"]["name"]) AND empty($_FILES["img4"]["name"]) AND empty($_FILES["img5"]["name"])) {
	 		
	 	
	 	$resulta = mysqli_query($conectado,"INSERT INTO imagenanun (NombIman, CodiAnun) values ('anuncios/default.png', '".$ultimoclasi."')");
	 	}
	 	if ($destacadostring == "true") {
	 	$mensaje = "Nueva OFERTA.\r\n  Codigo Anuncio: '".$ultimoclasi."' \r\n  VERIFICA SI SE HA REALIZADO EL PAGO EN MERCADO PAGO." ;
					
		mail('gc.globalcom@gmail.com', 'NUEVA OFERTA LOVI', $mensaje);
		}
	echo("Su anuncio se ha publicado correctamente");


?>