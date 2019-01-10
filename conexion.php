<?php 
/*
$conectado=mysql_connect("localhost","root","");
mysql_select_db("lovi",$conectado)or die("Error en la conexion");
*/
//$conectado = mysqli_connect("localhost","root","","lovi");


/* conexion PHP 7*/


$conectado = mysqli_connect("localhost","root","","lovi");

if (!$conectado) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuraciÃ³n: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuraciÃ³n: " . mysqli_connect_error() . PHP_EOL;
    exit;
} 

?>