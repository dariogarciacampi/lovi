<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>LOVI</title>
	<link rel="icon" type="image/png" href="imagen/icon.png" />
	<link rel="stylesheet" href="css/img.css">
	<link rel="stylesheet" href="css/destacado.css">
	<script src="jquery.js" type="text/javascript"></script>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">



<script type="text/javascript">
			  $(document).ready(function(){
			  	
			  	
			  	$('#rubros').hide();
			  	$('#inmobiliarios').hide();
			  	$('#rodados').hide();
			  	$('#tecnologia').hide();
			  	$('#empleos').hide();
			  	$('#varios').hide();
			  	$('#deportes').hide();

			  	$("#ocultarrubros").click(function(){
					$('#rubros').toggle('slow');
			  	});

			  	$("#ocultarinmob").click(function(){
					$('#inmobiliarios').toggle('slow');
			  	});

			  	$("#ocultarrodados").click(function(){
					$('#rodados').toggle('slow');
			  	});

			  	$("#ocultartecnologia").click(function(){
					$('#tecnologia').toggle('slow');
			  	});
			  	$("#ocultarempleos").click(function(){
					$('#empleos').toggle('slow');
			  	});
			  	$("#ocultarvarios").click(function(){
					$('#varios').toggle('slow');
			  	});
			  	$("#ocultardeportes").click(function(){
					$('#deportes').toggle('slow');
			  	});
			  	$(".accordion-titulo").click(function(){
		
				   var contenido=$(this).next(".accordion-content");
							
				   if(contenido.css("display")=="none"){ //open		
				      contenido.slideDown(250);			
				      $(this).addClass("open");
				   }
				   else{ //close		
				      contenido.slideUp(250);
				      $(this).removeClass("open");	
				  }
											
				});
			  

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

			<div class="row">


				<div class="col-md-2 column margintop20">

								

							            
			</div>  
		 
	
		<div class="col-md-10">
			<div class="col-xs-12">
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
			</div>
		</div>

		</div>


		<div class="row">
			<div class="col-sm-12 col-md-2 column margintop20">
				<div class="row" style="margin-bottom: 10px;">
				<button class="btn btn-success btn-lg btn-block" id="ocultarrubros">Rubros</button>
				</div>
				<div id="rubros" style="padding-top: 10px;">
					<ul class="nav nav-pills nav-stacked">
							  <li><a href="clasificados.php"><span class="glyphicon glyphicon-chevron-right"></span> Todos</a></li>
					</ul>
					<div class="row" style="margin-bottom: 10px;">
					<button class="btn btn-secundary btn-lg btn-block" id="ocultarinmob" >Inmobiliarios</button>
					</div>
					<div id="inmobiliarios" style="padding-bottom: 10px; ">
						 <ul class="nav nav-pills nav-stacked">
							  
							  <?php

												include("conexion.php"); 
												$gen =  mysqli_query($conectado,"SELECT * FROM subrubro WHERE CodiRubr = '1' ORDER BY CodiSubr ASC");
					    		 				while( $tipo = mysqli_fetch_array($gen) ) {
								
													echo "<li><a href='clasificados.php?subrubro=".$tipo['CodiSubr']."'><span class='glyphicon glyphicon-chevron-right'></span>".$tipo['NombSubr']."</a></li>" ;
													} ?>

						</ul>

					</div>
					<div class="row" style="margin-bottom: 10px;">
					<button class="btn btn-secundary btn-lg btn-block" onclick="" id="ocultarrodados" >Rodados</button>
					</div>
					<div id="rodados" style="padding-bottom: 10px; ">
						 <ul class="nav nav-pills nav-stacked">
							  
							  <?php

												include("conexion.php"); 
												$gen =  mysqli_query($conectado,"SELECT * FROM subrubro WHERE CodiRubr = '2' ORDER BY CodiSubr ASC");
					    		 				while( $tipo = mysqli_fetch_array($gen) ) {
								
													echo "<li><a href='clasificados.php?subrubro=".$tipo['CodiSubr']."'><span class='glyphicon glyphicon-chevron-right'></span>".$tipo['NombSubr']."</a></li>" ;
													} ?>

						</ul>

					</div>
					<div class="row" style="margin-bottom: 10px;">
					<button class="btn btn-secundary btn-lg btn-block" onclick="" id="ocultardeportes" >Deportes y Bicicletas</button>
					</div>
					<div id="deportes" style="padding-bottom: 10px; ">
						 <ul class="nav nav-pills nav-stacked">
							  
							  <?php

												include("conexion.php"); 
												$gen =  mysqli_query($conectado,"SELECT * FROM subrubro WHERE CodiRubr = '6' ORDER BY CodiSubr ASC");
					    		 				while( $tipo = mysqli_fetch_array($gen) ) {
								
													echo "<li><a href='clasificados.php?subrubro=".$tipo['CodiSubr']."'><span class='glyphicon glyphicon-chevron-right'></span>".$tipo['NombSubr']."</a></li>" ;
													} ?>

						</ul>

					</div>
					<div class="row" style="margin-bottom: 10px;">
					<button class="btn btn-secundary btn-lg btn-block" onclick="" id="ocultartecnologia">Tecnología</button>
					</div>
					<div id="tecnologia" style="padding-bottom: 10px; ">
						 <ul class="nav nav-pills nav-stacked">
							  
							  <?php

												include("conexion.php"); 
												$gen =  mysqli_query($conectado,"SELECT * FROM subrubro WHERE CodiRubr = '3' ORDER BY CodiSubr ASC");
					    		 				while( $tipo = mysqli_fetch_array($gen) ) {
								
													echo "<li><a href='clasificados.php?subrubro=".$tipo['CodiSubr']."'><span class='glyphicon glyphicon-chevron-right'></span>".$tipo['NombSubr']."</a></li>" ;
													} ?>

						</ul>
						</div>
						<div class="row" style="margin-bottom: 10px;">
					<button class="btn btn-secundary btn-lg btn-block" onclick="" id="ocultarempleos">Empleos</button>
						</div>
					<div id="empleos" style="padding-bottom: 10px; padding-top: 10px;">
						 <ul class="nav nav-pills nav-stacked">
							  
							  <?php

												include("conexion.php"); 
												$gen =  mysqli_query($conectado,"SELECT * FROM subrubro WHERE CodiRubr = '4' ORDER BY CodiSubr ASC");
					    		 				while( $tipo = mysqli_fetch_array($gen) ) {
								
													echo "<li><a href='clasificados.php?subrubro=".$tipo['CodiSubr']."'><span class='glyphicon glyphicon-chevron-right'></span>".$tipo['NombSubr']."</a></li>" ;
													} ?>

						</ul>
						</div>
						<div class="row" style="margin-bottom: 10px;">
					<button class="btn btn-secundary btn-lg btn-block" onclick="" id="ocultarvarios">Hogar - Muebles</button>
						</div>
					<div id="varios" style="padding-bottom: 10px; padding-top: 10px;">
						 <ul class="nav nav-pills nav-stacked">
							  
							  <?php

												include("conexion.php"); 
												$gen =  mysqli_query($conectado,"SELECT * FROM subrubro WHERE CodiRubr = '5' ORDER BY CodiSubr ASC");
					    		 				while( $tipo = mysqli_fetch_array($gen) ) {
								
													echo "<li><a href='clasificados.php?subrubro=".$tipo['CodiSubr']."'><span class='glyphicon glyphicon-chevron-right'></span>".$tipo['NombSubr']."</a></li>" ;
													} ?>

						</ul>
						</div>

				</div>
				<a href="https://api.whatsapp.com/send?phone=5493584191775"><img src="imagen/banner_whatsapp.jpg" width="100%" class="img-responsive"></a>		            
			</div> 

			<div class="col-sm-12 col-md-10">
				<div class="row" style="margin-bottom: 20px; margin-left: 10px; margin-right: 10px">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
							<div class="row" style="margin-bottom: 10px;">
							<button class="btn btn-default btn-lg btn-block" OnClick="location.href='clasinuevo.php'">Publica GRATIS </button>
							</div>
						</div>
						<div class="col-xs-0 col-sm-0 col-md-0 col-lg-4">
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
							<div class="row" style="margin-bottom: 10px;">
							<button class="btn btn-secundary btn-lg btn-block" OnClick="location.href='https://api.whatsapp.com/send?phone=5493584191775'" >Publica GRATIS <img src="imagen/whatsapp.png" height="20px"></button>
							</div>
						</div>
				</div>
				<a href="https://api.whatsapp.com/send?phone=5493584191775"><img src="publi/bannerclasi1.gif" width="100%" class="img-responsive"></a>
		<div class="datos" id="articulos">

			<table class="table table-striped">
			  
			  <tbody>
			  <?php
			include("conexion.php");

			$fechav = date('Y-m-d H:i:s', (strtotime ("-3 Hours")));

			        	mysqli_query($conectado,"INSERT INTO estadistica (FechEsta, VisiEsta, CodiClasi) values  ('".$fechav."','Clasificado', '0')");


				$producto =  mysqli_query($conectado,"SELECT clasificado.CodiClasi, TituClasi, PrecClasi, NombImag FROM clasificado INNER JOIN imagen ON imagen.CodiClasi = clasificado.CodiClasi INNER JOIN subrubro ON subrubro.CodiSubr = clasificado.CodiSubr INNER JOIN rubro ON rubro.CodiRubr = subrubro.CodiRubr WHERE clasificado.EstaClasi = 'Destacado' GROUP BY clasificado.CodiClasi");
			

			 while( $prodd = mysqli_fetch_array($producto) ) {
    			
      			 $imagen = $prodd["NombImag"];?>
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 <?php echo "<a href='detalleclasi.php?id=".$prodd['CodiClasi']."'><div class='destacado'><img src='".$imagen."' border='0' class='img-rounded img-responsive crop'></div> </a>"; ?>
      			<div style="height: 30px; text-overflow: ellipsis;overflow:hidden;"><h5><?php echo "<a href='detalleclasi.php?id=".$prodd['CodiClasi']."'>". $prodd["TituClasi"]."</a>" ; ?></h5> ?></div>
      			$ <?php echo number_format($prodd["PrecClasi"]) ; ?>	
      			 </div>	
      			
		        <?php }


			        	$ds =  mysqli_query($conectado,"SELECT clasificado.CodiClasi, TituClasi, CuerClasi, PrecClasi, NombImag, NombSubr, CodiSubr FROM clasificado INNER JOIN imagen ON imagen.CodiClasi = clasificado.CodiClasi INNER JOIN subrubro ON subrubro.CodiSubr = clasificado.CodiSubr WHERE clasificado.EstaClasi <> 'Destacado' AND clasificado.CodiSubr = ".$cat." GROUP BY clasificado.CodiClasi DESC");
			//Limito la busqueda
			$TAMANO_PAGINA = 15;

			//examino la página a mostrar y el inicio del registro a mostrar
			$pagina = $_GET["pagina"];
			if (!$pagina) {
			    $inicio = 0;
			    $pagina=1;
			}
			else {
			    $inicio = ($pagina - 1) * $TAMANO_PAGINA;
			}

			$txt_criterio = $_GET["criterio"];

			if (isset($_POST['criterio'])) {
				$txt_criterio = $_POST['criterio'];
			}

			if (isset($_REQUEST['subrubro'])){
				
				$cat = $_REQUEST["subrubro"];
				$rs =  mysqli_query($conectado,"SELECT clasificado.CodiClasi, TituClasi, CuerClasi, PrecClasi, NombImag, NombSubr, CodiSubr FROM clasificado INNER JOIN imagen ON imagen.CodiClasi = clasificado.CodiClasi INNER JOIN subrubro ON subrubro.CodiSubr = clasificado.CodiSubr WHERE clasificado.EstaClasi <> 'Destacado' AND clasificado.CodiSubr = ".$cat." GROUP BY clasificado.CodiClasi DESC");

				$producto =  mysqli_query($conectado,"SELECT clasificado.CodiClasi, TituClasi, CuerClasi, PrecClasi, NombImag, NombSubr FROM clasificado INNER JOIN imagen ON imagen.CodiClasi = clasificado.CodiClasi INNER JOIN subrubro ON subrubro.CodiSubr = clasificado.CodiSubr WHERE clasificado.EstaClasi <> 'Destacado' AND clasificado.CodiSubr = ".$cat." GROUP BY clasificado.CodiClasi DESC LIMIT ".$inicio. ",".$TAMANO_PAGINA."");
			} else {

			$rs =  mysqli_query($conectado,"SELECT clasificado.CodiClasi, TituClasi, CuerClasi, PrecClasi, NombImag, NombSubr FROM clasificado INNER JOIN imagen ON imagen.CodiClasi = clasificado.CodiClasi INNER JOIN subrubro ON subrubro.CodiSubr = clasificado.CodiSubr WHERE TituClasi LIKE '%".$txt_criterio."%' OR  CuerClasi LIKE '%".$txt_criterio."%' GROUP BY clasificado.CodiClasi DESC");

				$producto =  mysqli_query($conectado,"SELECT clasificado.CodiClasi, TituClasi, CuerClasi, PrecClasi, NombImag, NombSubr FROM clasificado INNER JOIN imagen ON imagen.CodiClasi = clasificado.CodiClasi INNER JOIN subrubro ON subrubro.CodiSubr = clasificado.CodiSubr WHERE TituClasi LIKE '%".$txt_criterio."%' OR  CuerClasi LIKE '%".$txt_criterio."%' GROUP BY clasificado.CodiClasi DESC LIMIT ".$inicio. ",".$TAMANO_PAGINA."");
			}
			

			$num_total_registros = mysqli_num_rows($rs);
			//calculo el total de páginas
			$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA); 

			 while( $prod = mysqli_fetch_array($producto) ) {
    			?>
    			<tr>
    				<?php 
      			 $imagen = $prod["NombImag"]; ?>
    			<td><?php echo "<a href='detalleclasi.php?id=".$prod['CodiClasi']."'><div class='containerimg'><img src='".$imagen."' border='0' class='img-rounded img-responsive crop'></div> </a>"; ?></td>
      			<td><div style="height: 100px; text-overflow: ellipsis;overflow:hidden;"><p><h4><?php echo "<a href='detalleclasi.php?id=".$prod['CodiClasi']."'>". $prod["TituClasi"]."</a>" ; ?></h4></p><p style="font-size: 12px; color: gray;"><?php echo $prod["NombSubr"] ; ?></p><?php echo $prod["CuerClasi"] ; ?>...</div></td>
      			
      			<td style="vertical-align: middle; width: 130px; text-align: right;"><h4>$ <?php echo number_format($prod["PrecClasi"]); ; ?></h4></td>
   				
      			</tr>			
		        <?php } ?>
			  </tbody>
			</table>
			</div>
			</div>
		<div class="col-xs-4">
		</div>
		<div class="col-xs-4">
		<nav aria-label="Page navigation example">
		  <ul class="pagination justify-content-center">
		<?php
		if (isset($_REQUEST['rubro'])){
		if ($total_paginas > 1){
		    for ($i=1;$i<=$total_paginas;$i++){
		       if ($pagina == $i)
		          //si muestro el índice de la página actual, no coloco enlace
		          echo "<li class='page-item disabled'><a class='page-link'>" . $pagina . "</a></li> ";
		       else
		          //si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página
		          echo "<li class='page-item'><a class='page-link' href='clasificados.php?pagina=" . $i . " &rubro=".$cat."'>" . $i . "</a></li> ";
		    }
		} } else {
				if ($total_paginas > 1){
		    for ($i=1;$i<=$total_paginas;$i++){
		       if ($pagina == $i)
		          //si muestro el índice de la página actual, no coloco enlace
		          echo "<li class='page-item disabled'><a class='page-link'>" . $pagina . "</a></li> ";
		       else
		          //si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página
		          echo "<li class='page-item'><a class='page-link' href='clasificados.php?pagina=" . $i . " &rubro=".$txt_criterio."'>" . $i . "</a></li> ";
		    }
		}

			} ?>

		</ul>
		</nav>
		</div>
		<div class="col-xs-4">
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


	
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
</body>
</html>