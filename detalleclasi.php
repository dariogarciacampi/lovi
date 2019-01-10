<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>LOVI</title>
	<link rel="icon" type="image/png" href="imagen/icon.png" />
	
	<script src="jquery.js" type="text/javascript"></script>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   

	

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">



<script type="text/javascript">
			  $(document).ready(function(){
				
				

			});
</script>


</head>
<body> 

	<header>
		
			<div class="container-fluid">
				
					<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
						<div class="container">	
							<div class="navbar-header">
								<a class="navbar-brand" href="index.php"><img style="max-width:100px; margin-top: -12px;" src="imagen/logo.png"  /></a>
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
									<span class="sr-only">Menu</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>

								</button>

							</div>
									
								<div class="collapse navbar-collapse navbar-right" id="navbar-1">

									
									<ul class="nav navbar-nav">
										<li><a href="index.php">INICIO</a></li>
										<li><a href="ofertas.php">OFERTAS</a></li>
										<li><a href="comercios.php">COMERCIOS</a></li>
										<li><a href="clasificados.php">CLASIFICADOS</a></li>
										<li class="dropdown">
									        <a class="dropdown-toggle" data-toggle="dropdown" href="#">LOGIN
									        <span class="caret"></span></a>
									        <ul class="dropdown-menu">
									        	<?php if (!isset($_SESSION["user"])){ ?>
									          <li><a href="sesion.php">INICIAR SESIÓN</a></li>
									          <li><a href="registrocomercio.php">REGISTRAR COMERCIO</a></li>
									      <?php } else { 
									      	echo "<li><a href='cerrarsesion.php'>CERRAR SESIÓN</a></li>" ;
									      }?>
									          <li><a href="contacto.php">CONTACTO</a></li>
									          <?php 
									          if ($_SESSION["estado"] == "Super Admin"){
									          	echo "<li><a href='paneladmin.php'>PANEL DE CONTROL</a></li>" ;
									          } elseif ($_SESSION["estado"] == "Activo") {
									          	echo "<li><a href='cpanel.php'>PANEL DE CONTROL</a></li>" ;
									          }
									          ?>
									        </ul>
									      </li>
									</ul>

								</div>
							</div>
						</nav>
				
			</div>
			
	</header>

	
		<div class="container" style="padding-top: 80px;">
			
			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
				<?php
			        	$idclasi = $_REQUEST["id"];
			        	include("conexion.php");
			        	$detalle =  mysqli_query($conectado,"SELECT * FROM clasificado WHERE CodiClasi = '".$idclasi."'");
			        	$clasif = mysqli_fetch_array($detalle);
			        	$telefono = $clasif["TeleClasi"];
			        	$whatsapp = $clasif["WhatClasi"];
			        	$domicilio = $clasif["DireClasi"];
			        	$titulo = $clasif["TituClasi"];


			        	$fechav = date('Y-m-d H:i:s', (strtotime ("-3 Hours")));

			        	mysqli_query($conectado,"INSERT INTO estadistica (FechEsta, VisiEsta, CodiClasi) values  ('".$fechav."','Clasificado', '".$idclasi."')");
			        	?>
			        	<h3><?php echo $clasif["TituClasi"]; ?></h3>
			        	
			        	<div class="w3-content w3-display-container">

			        	<?php
			        	$imagen =  mysqli_query($conectado,"SELECT * FROM imagen WHERE CodiClasi = '".$idclasi."'");

			        	while( $imag = mysqli_fetch_array($imagen) ) {
			        		$foto = $imag["NombImag"];

			        		echo "<div class='w3-display-container mySlides'><img src='".$foto."' class='zoom' style='width:100%'></div>";

			        	}
			        	?>
				
			        	 
			
							<button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
						<button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button>

						</div>
						


			        	<p><b><u>Fecha de Publicacion: </u></b><?php echo $clasif["FechClasi"]; ?></p>
			        	<p><?php echo $clasif["CuerClasi"]; ?></p>
			      </div>  	
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<h3>Precio: $ <?php echo number_format($clasif["PrecClasi"]); ?></h3>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
				<?php if ($telefono == "Sin Detallar") {
					echo "<a class='btn btn-success btn-lg btn-block disabled' role='button'>Llamar</a>" ;
				}else {
					 echo "<a href='tel:".$telefono."' class='btn btn-success btn-lg btn-block active' role='button'>Llamar: ".$telefono."</a>" ;
					}
					 ?>
				<?php if ($whatsapp == "Sin Detallar") {
					echo "<a class='btn btn-default btn-lg btn-block disabled' role='button'>WhatsApp</a>" ;
				}else { echo "<a href='https://api.whatsapp.com/send?phone=549".$whatsapp."&text=ME INTERESA SU ANUNCIO: %0A".$titulo." %0A  http://lovi.com.ar/detalleclasi.php?id=".$idclasi."%0A' target='_blank' class='btn btn-default btn-lg btn-block active' role='button'><img src='imagen/whatsapp.png' height='20px'>WhatsApp: ".$whatsapp."</a>" ;
					}
					?>
				<?php if ($domicilio == "Sin Detallar") {
					echo "<a class='btn btn-primary btn-lg btn-block disabled' role='button'>Domicilio</a>" ;
				}else { echo "<a href='https://maps.google.com/?q=".$domicilio."+Rio+Cuarto+Cordoba+Argentina' target='_blank' class='btn btn-primary btn-lg btn-block active' role='button'>Ver Domicilio</a>" ;
				}
				

				?>

				<a class="btn btn-default btn-lg btn-block active" role="button" href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u=http://lovi.com.ar/detalleclasi.php?id=<?php echo $idclasi ; ?>','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');"><img src="imagen/face.png" height="20px"> Compartir</a>

			</div>
			</div>
		
			
		
</div>




			
				
			
	




	<div id="footer">
      <div class="well">
        <p class="text-muted credit" style="text-align: center">LoVi © Copyright 2018 </p>
     	<p class="text-muted credit" style="text-align: center">25 de Mayo y Alberdi - Río Cuarto - Córdoba</p>
     	<p class="text-muted credit" style="text-align: center">0358 - 465-1236  </p>
      </div>
    </div>



	
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
	<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>
</body>
</html>