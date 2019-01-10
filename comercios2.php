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
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">



<script type="text/javascript">
			  $(document).ready(function(){
			  	
			  	
			  	$('#rubros').hide();
			  

			  	$("#ocultarrubros").click(function(){
					$('#rubros').toggle('slow');
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
				<form class="form-horizontal" id="formbuscador" method="post" action="comercios.php">
		    
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
				<button class="btn btn-success btn-lg btn-block" id="ocultarrubros">Comercios</button>
				</div>
				<div id="rubros" style="padding-top: 10px;">
					<ul class="nav nav-pills nav-stacked">
							  <li><a href="comercios.php"><span class="glyphicon glyphicon-chevron-right"></span> Todos</a></li>
							  
							  <?php

												include("conexion.php"); 
												$gen =  mysqli_query($conectado,"SELECT * FROM categoria ORDER BY NombCate ASC");
					    		 				while( $tipo = mysqli_fetch_array($gen) ) {
					    		 					//echo "<button class='btn btn-secundary btn-lg btn-block'  OnClick='location.href='clasificados.php?categoria=".$tipo['CodiCate']."'' >".$tipo['NombCate']."</button>"
								
													echo "<li><a href='comercios.php?categoria=".$tipo['CodiCate']."'><span class='glyphicon glyphicon-chevron-right'></span>".$tipo['NombCate']."</a></li>" ;
													} ?>

						</ul>

					


				</div>		            
			</div> 

			<div class="col-sm-12 col-md-10">
				<a href="https://api.whatsapp.com/send?phone=5493584191775"><img src="publi/bannerclasi1.gif" width="100%" class="img-responsive"></a>
		<div class="datos" id="articulos">
			
			  <?php
			

			$fechav = date('Y-m-d H:i:s', (strtotime ("-3 Hours")));

			        	mysqli_query($conectado,"INSERT INTO estadistica (FechEsta, VisiEsta, CodiClasi) values  ('".$fechav."','Comercios', '0')");


				


			        	$ds =  mysqli_query($conectado,"SELECT * FROM categoria INNER JOIN comercio ON categoria.CodiCate = comercio.CateCome INNER JOIN anuncio ON comercio.CodiCome = anuncio.CodiCome INNER JOIN imagenanun ON anuncio.CodiAnun = imagenanun.CodiAnun WHERE anuncio.EstaAnun = 'Publicado' AND comercio.CateCome = ".$cat." GROUP BY anuncio.CodiAnun DESC");
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

			if (isset($_REQUEST['categoria'])){
				
				$cat = $_REQUEST["categoria"];

				$rs =  mysqli_query($conectado,"SELECT * FROM categoria INNER JOIN comercio ON categoria.CodiCate = comercio.CateCome WHERE comercio.EstaCome = 'Activo' AND comercio.CateCome = ".$cat." GROUP BY comercio.CodiCome DESC");

				$producto =  mysqli_query($conectado,"SELECT * FROM categoria INNER JOIN comercio ON categoria.CodiCate = comercio.CateCome WHERE comercio.EstaCome = 'Activo' AND comercio.CateCome = ".$cat." GROUP BY comercio.CodiCome DESC LIMIT ".$inicio. ",".$TAMANO_PAGINA."");
			} else {

			$rs =  mysqli_query($conectado,"SELECT * FROM categoria INNER JOIN comercio ON categoria.CodiCate = comercio.CateCome WHERE comercio.NombCome LIKE '%".$txt_criterio."%' GROUP BY comercio.CodiCome DESC");

				$producto =  mysqli_query($conectado,"SELECT * FROM categoria INNER JOIN comercio ON categoria.CodiCate = comercio.CateCome WHERE comercio.NombCome LIKE '%".$txt_criterio."%' GROUP BY comercio.CodiCome DESC LIMIT ".$inicio. ",".$TAMANO_PAGINA."");
			}
			

			$num_total_registros = mysqli_num_rows($rs);
			//calculo el total de páginas
			$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);  ?>
			<div class="col-xs-12 col-sm-6 col-md-6">
			<table class="table table-striped">
			  
			  <tbody>

			<?php

			 while( $prod = mysqli_fetch_array($producto) ) {
    			?>
    			
    			<tr>
    				

				<?php
      			 $imagen = $prod["LogoCome"]; 
      			 $imagen2 = $prod["FotoCome"];
      			 $telefono = $prod["TeleCome"];
    			 $whatsapp = $prod["WhatCome"];
    			 $direccion = $prod["DireCome"];
      			  ?>
    			<td><?php echo "<a href='detalleanun.php?id=".$prod['CodiCome']."'><div class='containerimg'><img src='".$imagen."' border='0' class='img-rounded img-responsive crop'></div> </a>"; ?></td>
      			<td><div style="height: 100px; text-overflow: ellipsis;overflow:hidden;"><p><h4><?php echo "<a href='detalleanun.php?id=".$prod['CodiCome']."'>". $prod["NombCome"]."</a>" ; ?></h4></p>
      				<?php
      				 if ($telefono <> "Sin Detallar") {
					 echo "<a style='font-size: 12px; color: gray;' href='tel:".$telefono."'>Llamada </a><br>" ;
					}
					 if ($whatsapp <> "Sin Detallar") {
					 echo "<a style='font-size: 12px; color: gray;' href='https://api.whatsapp.com/send?phone=549".$whatsapp." target='_blank' ><img src='imagen/whatsapp.png' height='20px'>WhatsApp</a><br>" ;
					}
				 if ($direccion <> "Sin Detallar") {
					 echo "<a style='font-size: 12px; color: gray;' href='https://maps.google.com/?q=".$direccion."' target='_blank'> Ver Mapa</a><br>" ;
					} ?>
      			</td>
      			
      			</tr>			
		        <?php } ?>
			  </tbody>
			</table>
			</div>






			</div>
			</div>
		<div class="col-xs-4">
		</div>
		<div class="col-xs-4">
		<nav aria-label="Page navigation example">
		  <ul class="pagination justify-content-center">
		<?php
		if (isset($_REQUEST['categoria'])){
		if ($total_paginas > 1){
		    for ($i=1;$i<=$total_paginas;$i++){
		       if ($pagina == $i)
		          //si muestro el índice de la página actual, no coloco enlace
		          echo "<li class='page-item disabled'><a class='page-link'>" . $pagina . "</a></li> ";
		       else
		          //si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página
		          echo "<li class='page-item'><a class='page-link' href='comercios.php?pagina=" . $i . " &categoria=".$cat."'>" . $i . "</a></li> ";
		    }
		} } else {
				if ($total_paginas > 1){
		    for ($i=1;$i<=$total_paginas;$i++){
		       if ($pagina == $i)
		          //si muestro el índice de la página actual, no coloco enlace
		          echo "<li class='page-item disabled'><a class='page-link'>" . $pagina . "</a></li> ";
		       else
		          //si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página
		          echo "<li class='page-item'><a class='page-link' href='comercios.php?pagina=" . $i . " &categoria=".$txt_criterio."'>" . $i . "</a></li> ";
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