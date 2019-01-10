<?php session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>LOVI</title>
	<link rel="icon" type="image/png" href="imagen/icon.png" />
	<link rel="stylesheet" href="css/img.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="style.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

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
	
	<?php if (isset($_SESSION["user"])){ 
				?>
				<div class="container-fluid" style="margin-top: 50px;">
				<div class="row">
						
						<div class="col-xs-12 col-sm-4 ">
							<div class="row" style="margin-bottom: 10px;">
							<button class="btn btn-default btn-lg btn-block" OnClick="location.href='cpanel.php'">Panel de Control </button>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4">
							<div class="row" style="margin-bottom: 10px;">
							<button class="btn btn-default btn-lg btn-block" OnClick="location.href='clasinuevocomercio.php'" >Publicar una OFERTA</button>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4">
							<div class="row" style="margin-bottom: 10px;">
							<button class="btn btn-default btn-lg btn-block" OnClick="location.href='clasinuevocomercio.php'">Publicar GRATIS</button>
							</div>
						</div>
						
				</div>
				</div>
				<div class="container-fluid">
			<?php }  else { ?>
	
	<div class="container-fluid" style="margin-top: 55px;">
		
				<?php } ?>
			
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			    <li data-target="#myCarousel" data-slide-to="1"></li>
			    <li data-target="#myCarousel" data-slide-to="2"></li>
			    <li data-target="#myCarousel" data-slide-to="3"></li>
			    
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			    <div class="item active">
				      <img src="carrusel/carrusel1c.jpg" alt="Chania" class="img-responsive">
				    </div>

				    <div class="item">
				      <img src="carrusel/carrusel2c.jpg" alt="Chania" class="img-responsive">
				    </div>
			  

				  	<div class="item">
				      <img src="carrusel/carrusel3c.jpg" alt="Chania" class="img-responsive">
				    </div>

				    <div class="item">
				      <img src="carrusel/carrusel4c.jpg" alt="Chania" class="img-responsive">
				    </div>
				  </div>
			  
			  <!-- Left and right controls -->
			  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>


		
		

	</div>
		<div class="container" style="padding-top: 15px;">
			
				<form class="form-horizontal" id="formbuscador" method="post" action="clasificados.php">
		    
				    <div class="form-group">
				    
				        <div class="col-xs-9 col-sm-9  col-md-10  col-lg-10">
				            <input type="text" class="form-control" name="criterio" id="criterio" placeholder="Buscar">
				        </div>
				        <div class="col-xs-3 col-sm-3  col-md-2  col-lg-2">
				            <button type="submit" id="enviar-btn" class="btn btn-success" ><img src="imagen/xlupa.png" height="20px"></button>
				        </div>
				    </div>
				</form>

				<div class="row" style="margin-bottom: 20px; margin-left: 10px; margin-right: 10px">
						
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
							<div class="row" style="margin-bottom: 10px;">
							<button class="btn btn-danger btn-lg btn-block" OnClick="location.href='clasificados.php'">Ver Clasificados </button>
							</div>
						</div>
						<div class="col-xs-0 col-sm-1 col-md-1 col-lg-1">
						</div>
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
							<div class="row" style="margin-bottom: 10px;">
							<button class="btn btn-secundary btn-lg btn-block" OnClick="location.href='https://api.whatsapp.com/send?phone=5493584191775'" >Publica GRATIS <img src="imagen/whatsapp.png" height="20px"></button>
							</div>
						</div>
						<div class="col-xs-0 col-sm-1 col-md-1 col-lg-1">
						</div>
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
							<div class="row" style="margin-bottom: 10px;">
							<button class="btn btn-default btn-lg btn-block" OnClick="location.href='clasinuevo.php'">Publica GRATIS </button>
							</div>
						</div>
						
				</div>
				
			
	</div>
	<div class="container-fluid"">
			<marquee bgcolor="#F5F5F5" width="100%" scrolldelay="100" scrollamount="5" direction="left" loop="infinite">
				<?php
				include("conexion.php");

				$fechav = date('Y-m-d H:i:s', (strtotime ("-3 Hours")));

			        	mysqli_query($conectado,"INSERT INTO estadistica (FechEsta, VisiEsta, CodiClasi) values  ('".$fechav."','Inicio', '0')");

				$producto =  mysqli_query($conectado,"SELECT clasificado.CodiClasi, TituClasi, PrecClasi, NombImag FROM clasificado INNER JOIN imagen ON imagen.CodiClasi = clasificado.CodiClasi INNER JOIN subrubro ON subrubro.CodiSubr = clasificado.CodiSubr INNER JOIN rubro ON rubro.CodiRubr = subrubro.CodiRubr WHERE imagen.NombImag <> 'clasificados/default.png' AND rubro.CodiRubr = '2'  GROUP BY clasificado.CodiClasi DESC LIMIT 15");
			

			 while( $prod = mysqli_fetch_array($producto) ) {
    			
      			 $imagen = $prod["NombImag"];?>
      			 <div style="text-align: center; position: relative; display: inline-block; width: 200px;" >
    			 <?php echo "<a href='detalleclasi.php?id=".$prod['CodiClasi']."'><div class='containermarq'><img src='".$imagen."' border='0' class='img-rounded img-responsive crop'></div> </a>"; ?>
      			<div style="height: 30px; text-overflow: ellipsis;overflow:hidden;"><h5><?php echo "<a href='detalleclasi.php?id=".$prod['CodiClasi']."'>". $prod["TituClasi"]."</a>" ; ?></h5> ?></div>
      			$ <?php echo number_format($prod["PrecClasi"]) ; ?>	
      			 </div>	
		        <?php } ?>
		       
			</marquee>

			<marquee bgcolor="#F5F5F5" width="100%" scrolldelay="100" scrollamount="5" direction="right" loop="infinite">
				<?php
				include("conexion.php");

				$producto =  mysqli_query($conectado,"SELECT clasificado.CodiClasi, TituClasi, PrecClasi, NombImag FROM clasificado INNER JOIN imagen ON imagen.CodiClasi = clasificado.CodiClasi INNER JOIN subrubro ON subrubro.CodiSubr = clasificado.CodiSubr INNER JOIN rubro ON rubro.CodiRubr = subrubro.CodiRubr WHERE imagen.NombImag <> 'clasificados/default.png' AND rubro.CodiRubr = '1'  GROUP BY clasificado.CodiClasi  ASC");
			

			 while( $prod = mysqli_fetch_array($producto) ) {
    			
      			 $imagen = $prod["NombImag"];?>
      			 <div style="text-align: center; position: relative; display: inline-block; width: 200px;" >
    			 <?php echo "<a href='detalleclasi.php?id=".$prod['CodiClasi']."'><div class='containermarq'><img src='".$imagen."' border='0' class='img-rounded img-responsive crop'></div> </a>"; ?>
      			<div style="height: 30px; text-overflow: ellipsis;overflow:hidden;"><h5><?php echo "<a href='detalleclasi.php?id=".$prod['CodiClasi']."'>". $prod["TituClasi"]."</a>" ; ?></h5> ?></div>
      			$ <?php echo number_format($prod["PrecClasi"]) ; ?>	
      			 </div>	
		        <?php } ?>
		       
			</marquee>

			<marquee bgcolor="#F5F5F5" width="100%" scrolldelay="100" scrollamount="5" direction="left" loop="infinite">
				<?php
				include("conexion.php");

				$producto =  mysqli_query($conectado,"SELECT clasificado.CodiClasi, TituClasi, PrecClasi, NombImag FROM clasificado INNER JOIN imagen ON imagen.CodiClasi = clasificado.CodiClasi INNER JOIN subrubro ON subrubro.CodiSubr = clasificado.CodiSubr INNER JOIN rubro ON rubro.CodiRubr = subrubro.CodiRubr WHERE imagen.NombImag <> 'clasificados/default.png' AND rubro.CodiRubr = '3'  GROUP BY clasificado.CodiClasi DESC LIMIT 15");
			

			 while( $prod = mysqli_fetch_array($producto) ) {
    			
      			 $imagen = $prod["NombImag"];?>
      			 <div style="text-align: center; position: relative; display: inline-block; width: 200px;" >
    			 <?php echo "<a href='detalleclasi.php?id=".$prod['CodiClasi']."'><div class='containermarq'><img src='".$imagen."' border='0' class='img-rounded img-responsive crop'></div> </a>"; ?>
      			<div style="height: 30px; text-overflow: ellipsis;overflow:hidden;"><h5><?php echo "<a href='detalleclasi.php?id=".$prod['CodiClasi']."'>". $prod["TituClasi"]."</a>" ; ?></h5> ?></div>
      			$ <?php echo number_format($prod["PrecClasi"]) ; ?>	
      			 </div>	
		        <?php } ?>
		       
			</marquee>

	</div>			
	<div class="container">	
		<div class="row">
		  <div class="col-sm-3">
		    <div class="thumbnail">
		    
		        <img src="imagen/gratis.jpg" alt="Lights" style="width:100%">
		        <div class="caption">
		          <p>En <b>LOVI</b> podes publicar tu anuncio 100% Gratis, sin registrarte ni carga de datos tediosa.
Podes hacerlo a través del sitio www.lovi.com.ar o a través de <b>WhatsApp</b> enviandonos un audio o texto con foto de lo que queres vender y lo publicamos.</p>
		        </div>
		      
		    </div>
		  </div>
		  <div class="col-sm-3">
		    <div class="thumbnail">
		      
		        <img src="imagen/whatsappth.jpg" alt="Nature" style="width:100%">
		        <div class="caption">
		          <p>La comunicación con el vendedor del anuncio es extremadamente sencilla, basta con apretar un sólo boton para enviar un <b>WhatsApp</b> al anunciante desde tu smartphone.</p>
		        </div>
		      
		    </div>
		  </div>
		  <div class="col-sm-3">
		    <div class="thumbnail">
		      
		        <img src="imagen/llamada.jpg" alt="Fjords" style="width:100%">
		        <div class="caption">
		          <p>Si preferis hablar directamente, basta con apretar un sólo boton para realizar una <b>llamada</b> al vendedor del anuncio que te interese desde tu smartphone.</p>
		        </div>
		      
		    </div>
		  </div>
		  <div class="col-sm-3">
		    <div class="thumbnail">
		      
		        <img src="imagen/direccion.jpg" alt="Fjords" style="width:100%">
		        <div class="caption">
		          <p>Opcionalmente podras tener la localización del anunciante con presionar un solo botón y guiada mediante <b>GPS</b> de su dispositivo móvil.</p>
		        </div>
		      
		    </div>
		  </div>
		</div>
	</div>		
	




	<div id="footer">
      <div class="well">
        <p class="text-muted credit" style="text-align: center">LoVi © Copyright 2018 </p>
     	<p class="text-muted credit" style="text-align: center">25 de Mayo y Alberdi - Río Cuarto - Córdoba</p>
     	<p class="text-muted credit" style="text-align: center">0358 - 465-1236 </p>
      </div>
    </div>


	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
</body>
</html>