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
	

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

<script type="text/javascript">
			  $(document).ready(function(){

			  	$('.alert').hide();

			  	function muestracarga(){
			  		$("#cargando").show();
			  	}

			  	
			    $("#registrar-btn").click(function(){
			    	

			    	$('.alert').hide();	

				    	var rubro = $("#rubro").val();
				    	var nombre = $("#nombre").val();
				    	var mail = $("#mail").val();
				    	var password = $("#password").val();
				    	var direccion = $("#direccion").val();
				    	var whatsapp = $("#whatsapp").val();
				    	var telefono = $("#telefono").val();
				    	
				    	

				    	if (rubro == "0") {
				    		$("#errorrubro").show();
							$("#rubro").focus();
							return false;
						}
						if (nombre == "") {
							$("#errorcampo").show();
							$("#nombre").focus();
							return false;
						}

						if (mail == "") {
							$("#errorcampo").show();
							$("#mail").focus();
							return false;
						}

						if (password == "") {
							$("#errorcampo").show();
							$("#password").focus();
							return false;
						}

						if (telefono == "" && whatsapp== "") {
							$("#errortel").show();
							$("#whatsapp").focus();
							return false;
						}

						if (direccion == "") {
							direccion = "Sin Detallar";
						}
						if (telefono == "") {
							telefono = "Sin Detallar";
						}
						if (whatsapp == "") {
							whatsapp = "Sin Detallar";
						}
						

				    	
						muestracarga();
				    	var formData = new FormData();
						formData.append('img1', $('#img1')[0].files[0]);
						formData.append('img2', $('#img2')[0].files[0]);
						

						formData.append('rubro', rubro);
						formData.append('nombre', nombre);
						formData.append('mail', mail);
						formData.append('password', password);
						
						formData.append('direccion', direccion);
						formData.append('telefono', telefono);
						formData.append('whatsapp', whatsapp);
					
				    $.ajax({
				      url:"nuevocomercio.php",
				      type: "POST",
				      data: formData,
				      processData: false,  // tell jQuery not to process the data
       				  contentType: false,
				      success: function(respuesta){

				      	$("#cargando").hide();
				      	$("#formulariocomercio").hide();
				        $("#resp").show();
				        $("#resp").html(respuesta);
				      }
				    });

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

			<form class="form-horizontal" id="formulariocomercio" action="javascript:void(0);" enctype="multipart/form-data"> 

			<div class="form-group">
		        <label class="control-label col-xs-3">Nombre de Comercio/Empresa:</label>
		        <div class="col-xs-9 col-sm-9 col-md-6 col-lg-5">
		            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="LoVi" required="true">
		        </div>
		        
		    </div>
			
				
					<div class="form-group">
		        <label class="control-label col-xs-3">Rubro:</label>
		        <div class="col-xs-9 col-sm-9 col-md-6 col-lg-5">
		            <select type="post"  class="form-control" name="rubro" id="rubro" required="true">
		            <?php

		            	include("conexion.php");
		            	$result = mysqli_query($conectado,"SELECT CodiCate, NombCate from categoria ORDER BY NombCate ASC");
		            	  $opciones = '<option value="0">Seleccionar</option>';
						  while( $fila = mysqli_fetch_array($result) )
						  {
						    $opciones.='<option value="'.$fila["CodiCate"].'">'.$fila["NombCate"].'</option>';
						  }
						?>
						<?php echo $opciones; ?>
		            </select>
		        </div>
		        
		    </div>



		    <div class="form-group">
		        <label class="control-label col-xs-3" >Dirección:</label>
		        <div class="col-xs-9 col-sm-9 col-md-6 col-lg-5">
		            <input type="text" class="form-control" name="direccion" id="direccion" placeholder="25 de Mayo 305, Rio Cuarto">
		        </div>
		        
		    </div>

		    <div class="form-group">
		        <label class="control-label col-xs-3" >WhatsApp:</label>
		        <div class="col-xs-9 col-sm-9 col-md-6 col-lg-5">
		            <input type="number" class="form-control" name="whatsapp" id="whatsapp" placeholder="Sin 0 y sin 15. Ej: 3584191775">
		        </div>
		        
		    </div>


		    <div class="form-group">
		        <label class="control-label col-xs-3" >Llamadas:</label>
		        <div class="col-xs-9 col-sm-9 col-md-6 col-lg-5">
		            <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Sin 0 y sin 15. Ej: 3584191775">
		        </div>
		        
		    </div>

		     <div class="form-group">
		        <label class="control-label col-xs-3">Logo de Comercio/Empresa:</label>
		        <div class="col-xs-9 col-sm-9 col-md-6 col-lg-5">
		           	<input type="file" class="form-control-file" id="img1">
		      		</br>
		        </div>
		    </div>

		     <div class="form-group">
		        <label class="control-label col-xs-3">Foto del Lugar:</label>
		        <div class="col-xs-9 col-sm-9 col-md-6 col-lg-5">
		           	<input type="file" class="form-control-file" id="img2">
		      		</br>
		        </div>
		    </div>

		    <div class="form-group">
		        <label class="control-label col-xs-3" >Email:</label>
		        <div class="col-xs-9 col-sm-9 col-md-6 col-lg-5">
		            <input type="email" class="form-control" name="mail" id="mail" placeholder="lovimarketing@gmail.com">
		        </div>
		        
		    </div>
		    <div class="form-group">
		        <label class="control-label col-xs-3" >Contraseña:</label>
		        <div class="col-xs-9 col-sm-9 col-md-6 col-lg-5">
		            <input type="password" class="form-control" name="password" id="password" placeholder="">
		        </div>
		        
		    </div>




		    <div class="form-group">
		        <div class="col-xs-offset-3 col-xs-9">
		            <input type="submit" id="registrar-btn" class="btn btn-success" value="Registrar" >
		        </div>
		    </div>
		    
		    	

		</form>
		<div class="alert alert-danger" id="errortel">Debe Completar el telefono o whatsapp al menos</div>
				<div class="alert alert-danger" id="errorcampo">Debe Completar el campo Marcado</div>
				<div class="alert alert-danger" id="errorrubro">Debe Seleccionar Rubro</div>
				<div class="alert alert-info" id="cargando">Cargando... Por Favor espere</div>
				<div class="alert alert-success" id="resp"></div>
		
			
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