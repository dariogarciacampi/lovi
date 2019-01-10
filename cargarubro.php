<?php
 if(isset($_POST["idrubr"]))
 {
						include("conexion.php");
		            	$result = mysqli_query($conectado,"SELECT * from subrubro WHERE CodiRubr = ".$_POST["idrubr"]);
		            	  $opcionessub = '<option value="0"> Seleccionar</option>';
						  while( $fila = mysqli_fetch_array($result) )
						  {
						     $opcionessub.='<option value="'.$fila["CodiSubr"].'">'.$fila["NombSubr"].'</option>';
						  }

						  echo($opcionessub);
						}
						?>