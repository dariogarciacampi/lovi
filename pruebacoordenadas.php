<html>
<script type="text/javascript">// <![CDATA[
if (navigator.geolocation) {
  var tiempo_de_espera = 7000;
  navigator.geolocation.getCurrentPosition(mostrarCoordenadas, mostrarError, { enableHighAccuracy: true, timeout: tiempo_de_espera, maximumAge: 0 } );
}
else {
  alert("La Geolocalización no es soportada por este navegador");
}

function mostrarCoordenadas(position) {
  var latitud = position.coords.latitude;
  var longitud = position.coords.longitude;
  alert("Latitud: " + position.coords.latitude + ", Longitud: " + position.coords.longitude);
}

function mostrarError(error) {
  var errores = {1: 'Permiso denegado', 2: 'Posición no disponible', 3: 'Expiró el tiempo de respuesta'};
  alert("Error: " + errores[error.code]);
}
// ]]></script>

<?php 
function distancia($lat1, $lon1, $lat2, $lon2, $unit) {
 
  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);
 
  if ($unit == "K") {
  	$km = ($miles * 1.609344);
  	if ($km < 1) {
  		$km = $km * 1000;
  		return number_format($km)." m";
  	} else {
  		return number_format($km,1)." km";
  	}
    
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }
}

include("conexion.php");

$sql = "SELECT LatiCome,LongCome FROM comercio WHERE CodiCome = '1'";
$consulta = mysqli_query($conectado,$sql);

$puntos = mysqli_fetch($consulta);
$lat1 = $consulta["LatiCome"];
$lon1 = $consulta["LongCome"];

$lat2 = "<script> document.write(latitud) </script>";
$lon2 = "<script> document.write(longitud) </script>";

echo ($lat1);
echo ($lon1);

echo ($lat2);
echo ($lon2);

//echo distancia($lat1,$lon1,$lat2,$lon2,"K");

?>
</html>
