<?php 
	
	

	 	$subrubro = $_POST["subrubro"];
	 	$titulo = $_POST["titulo"];
	 	$titulo= str_replace('"', '', $titulo); 
	 	$titulo= str_replace("'", "", $titulo); 
	 	$cuerpo = $_POST['cuerpo'];
	 	$cuerpo= str_replace('"', '', $cuerpo); 
	 	$cuerpo= str_replace("'", "", $cuerpo); 
	 	$precio = $_POST["precio"];
	 	$precio= str_replace(',', '', $precio); 
	 	$precio= str_replace('.', '', $precio); 
	 	$direccion = $_POST["direccion"];
	 	$telefono = $_POST["telefono"];
	 	$whatsapp = $_POST["whatsapp"];
	 	$destacadostring = $_POST["destacadostring"];
	 	
	 	$fecha = date("Y-m-d") ;
	 	if ($destacadostring == "true") {
	 		$estadoclasi = "Destacado";
	 	}
	 		else{
	 		$estadoclasi = "Publicado";
	 	}

	 	include("conexion.php"); 

	 	$result = mysqli_query($conectado,"INSERT INTO clasificado (CodiSubr, FechClasi, TituClasi, CuerClasi, PrecClasi, EstaClasi, DireClasi, TeleClasi, WhatClasi) values ('".$subrubro."', '".$fecha."','".$titulo."','".$cuerpo."','".$precio."','".$estadoclasi."','".$direccion."','".$telefono."','".$whatsapp."')");

	 	$ubicacion =  mysqli_query($conectado,"SELECT NombSubr, NombRubr FROM subrubro INNER JOIN rubro ON rubro.CodiRubr = subrubro.CodiRubr WHERE subrubro.CodiSubr = '".$subrubro."'");
	 	$ubic = mysqli_fetch_array($ubicacion);
	 	$carpetarubro = $ubic["NombRubr"];
	 	$carpetasubrubro = $ubic["NombSubr"];

	 	

	 	$ultimopublicado =  mysqli_query($conectado,"SELECT CodiClasi FROM clasificado ORDER BY CodiClasi DESC LIMIT 1");
	 	$ultimo = mysqli_fetch_array($ultimopublicado);
	 	$ultimoclasi = $ultimo["CodiClasi"];

	 	
	 	if (!empty($_FILES["img1"]["name"])) {
	 		$imagen = $_FILES["img1"]["name"];
    	$nombre_archivo = rand(100,9999).$imagen;
    	$ruta = $_FILES["img1"]["tmp_name"];
	 	$destino = "clasificados/".$carpetarubro."/".$carpetasubrubro."/".$nombre_archivo ;
	 	move_uploaded_file($ruta, $destino);
	 	
	 	$resulta = mysqli_query($conectado,"INSERT INTO imagen (NombImag, CodiClasi) values ('".$destino."', '".$ultimoclasi."')");
	 	}
	 	
	 	if (!empty($_FILES["img2"]["name"])) {
	 		$imagen = $_FILES["img2"]["name"];
    	$nombre_archivo = rand(100,9999).$imagen;
    	$ruta = $_FILES["img2"]["tmp_name"];
	 	$destino = "clasificados/".$carpetarubro."/".$carpetasubrubro."/".$nombre_archivo ;
	 	move_uploaded_file($ruta, $destino);
	 	$resulta = mysqli_query($conectado,"INSERT INTO imagen (NombImag, CodiClasi) values ('".$destino."', '".$ultimoclasi."')");
	 	}
	 	if (!empty($_FILES["img3"]["name"])) {
	 		$imagen = $_FILES["img3"]["name"];
    	$nombre_archivo = rand(100,9999).$imagen;
    	$ruta = $_FILES["img3"]["tmp_name"];
	 	$destino = "clasificados/".$carpetarubro."/".$carpetasubrubro."/".$nombre_archivo ;
	 	move_uploaded_file($ruta, $destino);
	 	$resulta = mysqli_query($conectado,"INSERT INTO imagen (NombImag, CodiClasi) values ('".$destino."', '".$ultimoclasi."')");
	 	}
	 	if (!empty($_FILES["img4"]["name"])) {
	 		$imagen = $_FILES["img4"]["name"];
    	$nombre_archivo = rand(100,9999).$imagen;
    	$ruta = $_FILES["img4"]["tmp_name"];
	 	$destino = "clasificados/".$carpetarubro."/".$carpetasubrubro."/".$nombre_archivo ;
	 	move_uploaded_file($ruta, $destino);
	 	$resulta = mysqli_query($conectado,"INSERT INTO imagen (NombImag, CodiClasi) values ('".$destino."', '".$ultimoclasi."')");
	 	}
	 	if (!empty($_FILES["img5"]["name"])) {
	 		$imagen = $_FILES["img5"]["name"];
    	$nombre_archivo = rand(100,9999).$imagen;
    	$ruta = $_FILES["img5"]["tmp_name"];
	 	$destino = "clasificados/".$carpetarubro."/".$carpetasubrubro."/".$nombre_archivo ;
	 	move_uploaded_file($ruta, $destino);
	 	$resulta = mysqli_query($conectado,"INSERT INTO imagen (NombImag, CodiClasi) values ('".$destino."', '".$ultimoclasi."')");
	 	}

	 	if (empty($_FILES["img1"]["name"]) AND empty($_FILES["img2"]["name"]) AND empty($_FILES["img3"]["name"]) AND empty($_FILES["img4"]["name"]) AND empty($_FILES["img5"]["name"])) {
	 		
	 	
	 	$resulta = mysqli_query($conectado,"INSERT INTO imagen (NombImag, CodiClasi) values ('clasificados/default.png', '".$ultimoclasi."')");
	 	}
	 	if ($destacadostring == "true") {
	 	$mensaje = "Nuevo DESTACADO.\r\n  Codigo Clasificado: '".$ultimoclasi."' \r\n  VERIFICA SI SE HA REALIZADO EL PAGO EN MERCADO PAGO." ;
					
		mail('gc.globalcom@gmail.com', 'NUEVO DESTACADO LOVI', $mensaje);
		}
	echo("Su anuncio se ha publicado correctamente");


?>