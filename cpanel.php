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
			<?php if (isset($_SESSION["user"])){ 
				?>
				<div class="container-fluid" style="margin-top: 50px;">
				<div class="row">
						
						<div class="col-xs-12 col-sm-4 ">
							<div class="row" style="margin-bottom: 10px;">
							<button class="btn btn-default btn-lg btn-block" OnClick="location.href='modificarcomercio.php'">Modificar Datos</button>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4">
							<div class="row" style="margin-bottom: 10px;">
							<button class="btn btn-default btn-lg btn-block" OnClick="location.href='administrarcomercio.php'" >Administrar OFERTAS</button>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4">
							<div class="row" style="margin-bottom: 10px;">
							<button class="btn btn-default btn-lg btn-block" OnClick="location.href='administrarcomercio.php'">Administrar Publicaciones</button>
							</div>
						</div>
						
				</div>
				</div>
			<?php } ?>
			
	</header>
		<?php
		include("conexion.php");
		$comercio =  mysqli_query($conectado,"SELECT * FROM comercio INNER JOIN categoria ON categoria.CodiCate = comercio.CateCome WHERE CodiCome = ".$_SESSION["codigou"]."");
		$come = mysqli_fetch_array($comercio);
		$logo = $come["LogoCome"];
		$foto = $come["FotoCome"];
		?>
	
		<div class="container" style="padding-top: 80px;">
			<div class="row">
				<div class="col-xs-0 col-md-1 col-lg-1">
				</div>
				<div class="col-xs-6 col-md-5 col-lg-4" style="text-align: center;">
					<h3><b><u>Logo</u></b></h3><br>
					<?php echo "<img class='img-responsive img-circle' src='".$logo."' max-height='150px'>" ?>
				</div>
				<div class="col-xs-0 col-md-0 col-lg-2">
				</div>
				<div class="col-xs-6 col-md-5 col-lg-4" style="text-align: center;">
					<h3><b><u>Foto</u></b></h3><br>
					<?php echo "<img class='img-responsive ' src='".$foto."' max-height='150px'>" ?>
				</div>
				<div class="col-xs-0 col-md-1 col-lg-1">
				</div>
			</div>
			<div class="row">
				<h2><b><u>Datos de Comercio</u></b></h2><br>
				<b><u>Código:</u></b> <?php print $come["CodiCome"]; ?><br>
				<b><u>Nombre:</u></b> <?php print $come["NombCome"]; ?><br>
				<b><u>Dirección:</u></b> <?php print $come["DireCome"]; ?><br>
				<b><u>Telefono:</u></b> <?php print $come["TeleCome"]; ?><br>
				<b><u>WhataApp:</u></b> <?php print $come["WhatCome"]; ?><br>
				<b><u>Categoria:</u></b> <?php print $come["NombCate"]; ?><br>
				<b><u>E-Mail:</u></b> <?php print $come["CodiCome"]; ?><br>
				<b><u>Password:</u></b> <?php print $come["PassCome"]; ?><br>
				<b><u>Estado:</u></b> <?php print $come["EstaCome"]; ?><br>
				
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
	</body>
</html>