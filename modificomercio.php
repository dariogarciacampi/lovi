<?php session_start();
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
	 	$codigou = $_SESSION["codigou"];

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

include("conexion.php"); 
$resulta = mysqli_query($conectado,"UPDATE comercio SET NombCome = '".$nombre."', DireCome = '".$direccion."', TeleCome = '".$telefono."', WhatCome = '".$whatsapp."', CateCome = '".$rubro."', PassCome = '".$password."', LatiCome = '".$latitud."', LongCome = '".$longitud."' WHERE CodiCome = '".$codigou."'");

		if (!empty($_FILES["img1"]["name"])) {
	 		$imagen = $_FILES["img1"]["name"];
    	$nombre_archivo = rand(100,9999).$imagen;
    	$ruta = $_FILES["img1"]["tmp_name"];
	 	$destino = "comercios/".$nombre_archivo ;
	 	move_uploaded_file($ruta, $destino);
	 	$resulta = mysqli_query($conectado,"UPDATE comercio SET LogoCome = '".$destino."' WHERE CodiCome = '".$codigou."'");
	 	}
	 	
	 	if (!empty($_FILES["img2"]["name"])) {
	 		$imagen = $_FILES["img2"]["name"];
    	$nombre_archivo = rand(100,9999).$imagen;
    	$ruta = $_FILES["img2"]["tmp_name"];
	 	$destino = "comercios/".$nombre_archivo ;
	 	move_uploaded_file($ruta, $destino);
	 	$resulta = mysqli_query($conectado,"UPDATE comercio SET FotoCome = '".$destino."' WHERE CodiCome = '".$codigou."'");
	 	}

	echo("Sus datos han sido cambiados correctamente.");
?>