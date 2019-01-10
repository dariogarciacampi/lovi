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

			  	$(".numberr").on({
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

				    	
				    	var titulo = $("#titulo").val();
				    	var cuerpo = $("#cuerpo").val();
				    	var precio = $("#precio").val();
				    	
				    	
				    	if( $('#destacado').prop('checked') ) {
						    var destacadostring = "true";
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

						

						
						

				    	
						muestracarga();
				    	var formData = new FormData();
						formData.append('img1', $('#img1')[0].files[0]);
						formData.append('img2', $('#img2')[0].files[0]);
						formData.append('img3', $('#img3')[0].files[0]);
						formData.append('img4', $('#img4')[0].files[0]);
						formData.append('img5', $('#img5')[0].files[0]);

						
						formData.append('titulo', titulo);
						formData.append('cuerpo', cuerpo);
						formData.append('precio', precio);
						formData.append('destacadostring', destacadostring);
						

				    $.ajax({
				      url:"nuevapublicomercio.php",
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
				        window.location.href = "comercios.php";
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
		        <label class="control-label col-xs-3">Titulo:</label>
		        <div class="col-xs-9 col-sm-9 col-md-6 col-lg-5">
		            <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Zapatillas Deportivas" required="true">
		        </div>
		        
		    </div>
		    

			<div class="form-group">
		        <label class="control-label col-xs-3">Cuerpo del Anuncio:</label>
		        <div class="col-xs-9 col-sm-9 col-md-6 col-lg-5">
		            <textarea class="form-control" rows="6" name="cuerpo" id="cuerpo" placeholder="Varios colores y talles" required="true"></textarea>
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
			    <input type="checkbox" name="destacado" id="destacado"> Publicar en sección OFERTAS ($50 por 15 días)
				</div>
			  </div>
			</div>


		    <div class="form-group">
		        <label class="control-label col-xs-3" >Precio $:</label>
		        <div class="col-xs-9 col-sm-9 col-md-6 col-lg-5">
		            <input type="text" class="form-control numberr" name="precio" id="precio" placeholder="1.500"  inputmode="numeric">
		        </div>
		        
		    </div>

		    <div class="form-group">
		        <label class="control-label col-xs-3" >Precio en 1 Cuota $:</label>
		        <div class="col-xs-9 col-sm-9 col-md-6 col-lg-5">
		            <input type="text" class="form-control numberr" name="precio1" id="precio1" placeholder="Suma de todas las Cuotas"  inputmode="numeric">
		        </div>
		        
		    </div>

		    <div class="form-group">
		        <label class="control-label col-xs-3" >Precio en 3 Cuotas $:</label>
		        <div class="col-xs-9 col-sm-9 col-md-6 col-lg-5">
		            <input type="text" class="form-control numberr" name="precio3" id="precio3" placeholder="Suma de todas las Cuotas"  inputmode="numeric">
		        </div>
		        
		    </div>

		    <div class="form-group">
		        <label class="control-label col-xs-3" >Precio en 6 Cuotas $:</label>
		        <div class="col-xs-9 col-sm-9 col-md-6 col-lg-5">
		            <input type="text" class="form-control numberr" name="precio6" id="precio6" placeholder="Suma de todas las Cuotas"  inputmode="numeric">
		        </div>
		        
		    </div>

		    <div class="form-group">
		        <label class="control-label col-xs-3" >Precio en 12 Cuotas $:</label>
		        <div class="col-xs-9 col-sm-9 col-md-6 col-lg-5">
		            <input type="text" class="form-control numberr" name="precio12" id="precio12" placeholder="Suma de todas las Cuotas"  inputmode="numeric">
		        </div>
		        
		    </div>

		    <div class="form-group">
		        <label class="control-label col-xs-3" >Precio en 18 Cuotas $:</label>
		        <div class="col-xs-9 col-sm-9 col-md-6 col-lg-5">
		            <input type="text" class="form-control numberr" name="precio18" id="precio18" placeholder="Suma de todas las Cuotas"  inputmode="numeric">
		        </div>
		        
		    </div>

		    <div class="form-group">
		        <label class="control-label col-xs-3" >Precio en 24 Cuotas $:</label>
		        <div class="col-xs-9 col-sm-9 col-md-6 col-lg-5">
		            <input type="text" class="form-control numberr" name="precio24" id="precio24" placeholder="Suma de todas las Cuotas"  inputmode="numeric">
		        </div>
		        
		    </div>

		    <div class="form-group">
		        <div class="col-xs-offset-3 col-xs-9">
		            <input type="submit" id="publicar-btn" class="btn btn-success" value="Publicar" >
		        </div>
		    </div>
		   
				<div class="alert alert-danger" id="errorcampo">Debe Completar el campo Marcado</div>
				
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