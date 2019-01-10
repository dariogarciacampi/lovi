<?php 
	
	

	 	$rubro = $_POST["rubro"];
	 	$nombre = $_POST["nombre"];
	 	$nombre= str_replace('"', '', $nombre); 
	 	$nombre= str_replace("'", "", $nombre); 
	 	$mail = $_POST['mail'];
	 	$password = $_POST['password'];
	 	$direccion = $_POST["direccion"];
	 	$direccion = $direccion.", Rio Cuarto, Cordoba, Argentina";
	 	$telefono = $_POST["telefono"];
	 	$whatsapp = $_POST["whatsapp"];

		function getLatitud($address){
		    $address = urlencode($address);
		    $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=" . $address;
		    $response = file_get_contents($url);
		    $json = json_decode($response,true);
		 
		    $lat = $json['results'][0]['geometry']['location']['lat'];
		   
		 
		    return ($lat);
		    
		}

		function getLongitud($address){
		    $address = urlencode($address);
		    $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=" . $address;
		    $response = file_get_contents($url);
		    $json = json_decode($response,true);
		 
		    
		    $lng = $json['results'][0]['geometry']['location']['lng'];
		 
		    return ($lng);
		    
		}
		 
		 
		$latitud = getLatitud($direccion);
		$longitud = getLongitud($direccion);
	 	
	 	
	 	$fecha = date("Y-m-d") ;
	 	

	 	include("conexion.php"); 
	 
	 		
		$repetido =  mysqli_query($conectado,"SELECT * FROM comercio WHERE MailCome = '".$mail."'");
		            				if(mysqli_num_rows($repetido) > 0){
		            					echo("Usted ya se encuentra registrado en la pagina, pongase en contacto con la empresa para Iniciar Sesion");
		            				} else {

	 	$result = mysqli_query($conectado,"INSERT INTO comercio (NombCome, DireCome, TeleCome, WhatCome, CateCome, MailCome, PassCome, FotoCome, LogoCome, EstaCome, LatiCome, LongCome) values ('".$nombre."', '".$direccion."','".$telefono."','".$whatsapp."','".$rubro."','".$mail."','".$password."', 'clasificados/default.png', 'clasificados/default.png', 'Solicitado','".$latitud."','".$longitud."')");
	 	

	 	$ultimopublicado =  mysqli_query($conectado,"SELECT CodiCome FROM comercio ORDER BY CodiCome DESC LIMIT 1");
	 	$ultimo = mysqli_fetch_array($ultimopublicado);
	 	$ultimoclasi = $ultimo["CodiCome"];

	 	
	 	if (!empty($_FILES["img1"]["name"])) {
	 		$imagen = $_FILES["img1"]["name"];
    	$nombre_archivo = rand(100,9999).$imagen;
    	$ruta = $_FILES["img1"]["tmp_name"];
	 	$destino = "comercios/".$nombre_archivo ;
	 	move_uploaded_file($ruta, $destino);
	 	$resulta = mysqli_query($conectado,"UPDATE comercio SET LogoCome = '".$destino."' WHERE CodiCome = '".$ultimoclasi."'");
	 	}
	 	
	 	if (!empty($_FILES["img2"]["name"])) {
	 		$imagen = $_FILES["img2"]["name"];
    	$nombre_archivo = rand(100,9999).$imagen;
    	$ruta = $_FILES["img2"]["tmp_name"];
	 	$destino = "comercios/".$nombre_archivo ;
	 	move_uploaded_file($ruta, $destino);
	 	$resulta = mysqli_query($conectado,"UPDATE comercio SET FotoCome = '".$destino."' WHERE CodiCome = '".$ultimoclasi."'");
	 	}
	 	
	 	$mensaje = "Nuevo COMERCIO.\r\n  Codigo de Registro: '".$ultimoclasi."' \r\n  Contactar con el comercio o empresa para su respectiva adhesion." ;
					
		mail('gc.globalcom@gmail.com', 'NUEVO COMERCIO LOVI', $mensaje);
		
	echo("Su solicitud de registro se ha enviado correctamente, dentro de las proximas 24 hs hábiles será contactado para finalizar el proceso de registro y comenzar a utilizar nuestros servicios. Muchas gracias por confiar en LoVi.");
	}

	


?>