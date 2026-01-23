<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
</head>

<?php

$nombre = $_GET['nombreUsuario'];
$clave  = $_GET['claveUsuario'];
$provincia = array("index.html","PantallaCajero.html","Huelva"); 

//echo "<h4 style="background-color:pink">Comprobante Usuario y Contraseña</h4>";
echo "Nombre del Cliente: " . $nombre . "<br>";
echo "Clave ingresada: " . $clave . "<br>";

if ($clave == "1234") {
  echo "Saludos y bienvenido " . $nombre . ". Ha ingresado correctamente su información." . "<br>" . $p=1;
  echo "<br>" . ($provincia[$p]) . "<br>"; 
} else {
  echo "La contraseña introducida no es correcta." . "<br>" . $p=0;
  echo "<br>" . ($provincia[$p]) . "<br>"; 
}

?>

<body>

<br>
<button onclick="window.location.href='<?php echo $provincia[$p];?>';">Siguiente...</button>
<hr style="height:6px;border-width:0;border-color:red;background-color:red">
<p>La parte sobre la línea roja corresponde a los datos procesados en el lado Servidor. <br>Esta parte <span style="border: 2px solid red">NO AMARILLA</span> debajo de la línea son los datos disponibles en el lado Cliente.<br> En este caso, por ejemplo, el dato necesario para continuar con el enlace del botón "Siguiente" (index o PantallaCajero) se muestra a continuación:</p>
<p id="GoToDestino"></p>

<script type="text/javascript">
  var destino = "<?php echo $provincia[$p]; ?>";
  function myDestino(destino) {
  return destino;
  }
  document.getElementById("GoToDestino").innerHTML = myDestino(destino);
</script>

</body>

<footer>
  <hr style="height:4px;border-width:2px;border-color:red;background-color:yellow">
  <p><mark style="color:red;">Recordatorio de los ejercicios de variables PHP que nos daban a conocer los modos de recibir en el lado Cliente los datos provenientes del lado Servidor</mark></p>
       <a href="ejercicio_1.php">Ejercicio 1</a>
       <a href="ejercicio_2.php"><mark>Ejercicio 2</mark></a>
       <a href="ejercicio_3.php">Ejercicio 3</a>
       <a href="ejercicio_4.php">Ejercicio 4</a>
       <a href="ejercicio_5.php">Ejercicio 5</a>
       <a href="ejercicio_6.php">Ejercicio 6</a>
</footer>
</html>
