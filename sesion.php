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
				  	$("#resp").hide();
				    $("#iniciar-btn").click(function(){

				    	var login = $("#login").val();
				    	var password = $("#password").val();
				    	
				    	

				    	if (login == "") {
							$("#login").focus();
							return false;
						}
						if (password == "") {
							$("#password").focus();
							return false;
						}
					

				    	var dataString = 'login=' + login + '&password=' + password ;
				    $.ajax({
				      url:"iniciarse.php",
				      type: "POST",
				      data: dataString,
				      success: function(respuesta){
				      	
				        if (respuesta == 1) {
				        	var url = "http://lovi.com.ar";
							$(location).attr('href',url);
				        } else {
				        	$("#resp").show()
				        $("#resp").html(respuesta);
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
			
				
					<div class='col-xs-0 col-sm-3'>
					</div>
					<div class='col-xs-12 col-sm-6'>
					<form class="form-horizontal" id="formsesion" method="post">
						<h2>Iniciar Sesión</h2>
						<div class="form-group">
							
		      				<input type="text" id="login" name="login" value="" placeholder="Email" class="form-control">
		      				
	      				</div>
	      				<div class="form-group">
		      				
		      				<input type="password"  id="password" name="password" value="" placeholder="Contraseña" class="form-control">
		      				
		      			</div>
		      			<div class="form-group">
		      				
		      				<input type="button" id="iniciar-btn" value="Iniciar Sesion" class="btn btn-default">
		      				
	      				</div>
	      				<div class="alert alert-danger" id="resp"></div>
	      			</form>
	      			</div>
    				<div class='col-xs-0 col-sm-3'>
					</div>
			
			
				
			
		</div>

		<div class="container">
			<div class='col-xs-0 col-sm-3 col-md-3 col-lg-3'>
				</div>
				<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
				<img src="imagen/iniciarsesion.png" width="100%">
				</div>
				<div class='col-xs-0 col-sm-3 col-md-3 col-lg-3'>
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