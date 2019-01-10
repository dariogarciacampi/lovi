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

			  	$("#precio").on({
					    "focus": function (event) {
					        $(event.target).select();
					    },
					    "keyup": function (event) {
					        $(event.target).val(function (index, value ) {
					            return value.replace(/\D/g, "")
					                        
					                        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
					        });
					    }
					});

			  	$('.alert').hide();

			  	function muestracarga(){
			  		$("#cargando").show();
			  	}

			  	
			    $("#publicar-btn").click(function(){
			    	

			    	$('.alert').hide();	

				    	var subrubro = $("#subrubro").val();
				    	var titulo = $("#titulo").val();
				    	var cuerpo = $("#cuerpo").val();
				    	var precio = $("#precio").val();
				    	
				    	var precio = $("#precio").val();
				    	var direccion = $("#direccion").val();
				    	var whatsapp = $("#whatsapp").val();
				    	var telefono = $("#telefono").val();
				    	if( $('#destacado').prop('checked') ) {
						    var destacadostring = "true";
						}
				    	

				    	if (subrubro == "0") {
				    		$("#errorrubro").show();
							$("#subrurbro").focus();
							return false;
						}
						if (titulo == "") {
							$("#errorcampo").show();
							$("#titulo").focus();
							return false;
						}

						if (cuerpo == "") {
							$("#errorcampo").show();
							$("#cuerpo").focus();
							return false;
						}

						if (precio == "") {
							$("#errorcampo").show();
							$("#precio").focus();
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
						formData.append('img3', $('#img3')[0].files[0]);
						formData.append('img4', $('#img4')[0].files[0]);
						formData.append('img5', $('#img5')[0].files[0]);

						formData.append('subrubro', subrubro);
						formData.append('titulo', titulo);
						formData.append('cuerpo', cuerpo);
						formData.append('precio', precio);
						formData.append('destacadostring', destacadostring);
						formData.append('direccion', direccion);
						formData.append('telefono', telefono);
						formData.append('whatsapp', whatsapp);

				    $.ajax({
				      url:"nuevapubli.php",
				      type: "POST",
				      data: formData,
				      processData: false,  // tell jQuery not to process the data
       				  contentType: false,
				      success: function(respuesta){

				      	$("#muestracarga").hide();
				        $("#resp").show();
				        $("#resp").html(respuesta);
				        if( $('#destacado').prop('checked') ) {
						    window.location.href = "cobrodestacado.php";
						}
				        	else {
				        window.location.href = "clasificados.php";
				        }

				       
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
			
				<form class="form-horizontal" id="formularioclasificado" action="javascript:void(0);" enctype="multipart/form-data"> 
					<div class="form-group">
		        <label class="control-label col-xs-3">Rubro:</label>
		        <div class="col-xs-9 col-sm-9 col-md-6 col-lg-5">
		            <select type="post"  class="form-control" name="rubro" id="rubro" required="true">
		            <?php

		            	include("conexion.php");
		            	$result = mysqli_query($conectado,"SELECT CodiRubr, NombRubr from rubro");
		            	  $opciones = '<option value="0">Seleccionar</option>';
						  while( $fila = mysqli_fetch_array($result) )
						  {
						    $opciones.='<option value="'.$fila["CodiRubr"].'">'.$fila["NombRubr"].'</option>';
						  }
						?>
						<?php echo $opciones; ?>
		            </select>
		        </div>
		        
		    </div>

		    <script type="text/javascript">
			  $(document).ready(function(){
			    $("#rubro").change(function(){
			    $.ajax({
			      url:"cargarubro.php",
			      type: "POST",
			      data:"idrubr="+$("#rubro").val(),
			      success: function(opcionessub){
			        $("#subrubro").html(opcionessub);
			      }
			    })
			  });
			});
			</script>



		    <div class="form-group">
		        <label class="control-label col-xs-3">Sub Rubro:</label>
		        <div class="col-xs-9 col-sm-9 col-md-6 col-lg-5">
		            <select class="form-control" name="subrubro" id="subrubro" placeholder="Seleccionar">
		            	<option value="0">Seleccionar</option>
		            </select>
		        </div>
		    </div>
		    <div class="form-group">
		        <label class="control-label col-xs-3">Titulo:</label>
		        <div class="col-xs-9 col-sm-9 col-md-6 col-lg-5">
		            <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Chevrolet Cruze 2018" required="true">
		        </div>
		        
		    </div>
		    

			<div class="form-group">
		        <label class="control-label col-xs-3">Cuerpo del Anuncio:</label>
		        <div class="col-xs-9 col-sm-9 col-md-6 col-lg-5">
		            <textarea class="form-control" rows="6" name="cuerpo" id="cuerpo" placeholder="CRUZE LT Tapizados de Cuero Espejos electricos Aire Acondicionado Dirección Eléctrica ABS Airbag Levanta vidrios electricos Pantalla tactil 7” Stereo MP3/Bluetooth Llantas de aleacion de 17” Sensores de estacionamiento Control de velocidad crucero Volante multifunción" required="true"></textarea>
		        </div>
		        
		    </div>

		    <div class="form-group">
		        <label class="control-label col-xs-3">Imágen:</label>
		        <div class="col-xs-9 col-sm-9 col-md-6 col-lg-5">
		           	<input type="file" class="form-control-file" id="img1">
		      		</br>
  					<input type="file" class="form-control-file" id="img2">
  					</br>
  					<input type="file" class="form-control-file" id="img3">
  					</br>
  					<input type="file" class="form-control-file" id="img4">
  					</br>
  					<input type="file" class="form-control-file" id="img5">
		        </div>
		    </div>
		
				
		    </br>
		    <div class="form-group">
		    <div class="checkbox">
		    	<label class="control-label col-xs-3" ></label>
		        <div class="col-xs-9 col-sm-9 col-md-6 col-lg-5">
			    <input type="checkbox" name="destacado" id="destacado"> Publicar como DESTACADO ($50 por 30 días)
				</div>
			  </div>
			</div>


		    <div class="form-group">
		        <label class="control-label col-xs-3" >Precio $:</label>
		        <div class="col-xs-9 col-sm-9 col-md-6 col-lg-5">
		            <input type="text" class="form-control numberr" name="precio" id="precio" placeholder="25.0000"  inputmode="numeric">
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
		        <div class="col-xs-offset-3 col-xs-9">
		            <input type="submit" id="publicar-btn" class="btn btn-success" value="Publicar" >
		        </div>
		    </div>
		    <div class="alert alert-danger" id="errortel">Debe Completar el telefono o whatsapp al menos</div>
				<div class="alert alert-danger" id="errorcampo">Debe Completar el campo Marcado</div>
				<div class="alert alert-danger" id="errorrubro">Debe Seleccionar Rubro y SubRubro</div>
				<div class="alert alert-info" id="cargando">Cargando... Por Favor espere</div>
				<div class="alert alert-success" id="resp"></div>
		    	

		</form>

		
			
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