<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Acceso Cajero</title>
</head>

<body>

<?php
$nombre = $_GET['nombreUsuario'] ?? '';
$clave  = $_GET['claveUsuario'] ?? '';

$rutas = array(
    "login" => "index.html",
    "cajero" => "PantallaCajero.html"
);

echo "Nombre del Cliente: $nombre <br>";
echo "Clave ingresada: $clave <br>";

if ($clave === "1234") {
    $destino = $rutas["cajero"];
    echo "Saludos y bienvenido $nombre. Ha ingresado correctamente su información.<br>";
} else {
    $destino = $rutas["login"];
    echo "La contraseña introducida no es correcta.<br>";
}
?>

<button onclick="window.location.href='<?php echo $destino; ?>'">
  Siguiente...
</button>

<hr style="height:6px;border-width:0;background-color:red">

<p>
La parte sobre la línea roja corresponde a los datos procesados en el lado Servidor.<br>
La parte inferior corresponde al lado Cliente.<br>
Destino calculado:
</p>

<p id="GoToDestino"></p>

<script>
  document.getElementById("GoToDestino").innerHTML = "<?php echo $destino; ?>";
</script>

<footer>
  <hr style="height:4px;border-width:2px;background-color:yellow">
  <p>
    <mark style="color:red;">
      Recordatorio de los ejercicios de variables PHP
    </mark>
  </p>
</footer>

</body>
</html>