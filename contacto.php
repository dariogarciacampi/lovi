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
				  	$('.alert').hide();
				    $("#consultar-btn").click(function(){
				    	$('.alert').hide();
				    	var nombre = $("#nombre").val();
				    	var email = $("#email").val();
				    	var comentario = $("#comentario").val();
				    	


						if (nombre == "") {
							$("#errorcampo").show();
							$("#nombre").focus();
							return false;
						}else{
							$("#errorcampo").hide();
						}

				    	if (email == "") {
							$("#errorcampo").show();
							$("#email").focus();
							return false;
						}else{
							$("#errorcampo").hide();
						}

						if (comentario == "") {
							$("#errorcampo").show();
							$("#comentario").focus();
							return false;
						}else{
							$("#errorcampo").hide();
						}
					


				    	var dataString = 'email=' + email + '&nombre=' + nombre + '&comentario=' + comentario; 
				    $.ajax({
				      url:"consulta.php",
				      type: "POST",
				      data: dataString,
				      success: function(respuesta){
				        $("#formularioregistro").hide();
				        $("#respp").show();
				        $("#respp").html(respuesta);
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
			<div class='col-xs-12 col-sm-2'>
		</div>
			<div class='col-xs-12 col-sm-8'>
				<h3>Consulta</h3>
				<div class="alert alert-success" id="respp">Su consulta ha sido enviada con éxito. Recibirá su correspondiente respuesta al email ingresado. Muchas gracias.</div>

					<form class="form-horizontal" id="formularioregistro" method="post" enctype="multipart/form-data">
						<div class="form-group">
					        <label class="control-label col-xs-3">Nombre:</label>
					        <div class="col-xs-9">
					            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required="true">
					        </div>
					        
				        </div>
				        <div class="form-group">
					        <label class="control-label col-xs-3">Email:</label>
					        <div class="col-xs-9">
					            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="true">
					        </div>
					     
				        </div>
				        <div class="form-group">
					        <label class="control-label col-xs-3">Comentario:</label>
					        <div class="col-xs-9">
					            <textarea  class="form-control" name="comentario" id="comentario" placeholder="Comentario o Consulta" required="true">
					            </textarea>
					        </div>
				        </div>
				        <div class="alert alert-danger" id="errorcampo">Debe completar todos los campos.</div>
				        <div class="form-group">
					        <label class="control-label col-xs-3"></label>
					        <div class="col-xs-9">
					            <input type="button" id="consultar-btn" class="btn btn-primary" value="Enviar" >
					            <input type="reset" class="btn btn-default" value="Limpiar">
					        </div>
					    </div>

					</form>
			</div>
			<div class='col-xs-12 col-sm-2'>
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