<?php 
	
		$nombre = $_POST["nombre"];
	 	$email = $_POST["email"];
	 	$consulta = $_POST['comentario'];
	 	

	$mensaje = "Consulta de: '".$nombre."'. \r\n  Email: '".$email."' \r\n  Consulta: '".$consulta."'" ;
					
	mail('gc.globalcom@gmail.com', 'Consulta desde la Web', $mensaje);

	echo("La consulta se envió exitosamente, a la brevedad sera contactado via email para responder a su consulta."); 
	?>