<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprobante de Usuario</title>
    <style>
        hr.red { height: 6px; border: 0; background-color: red; }
        hr.yellow { height: 4px; border: 2px solid red; background-color: yellow; }
        mark.custom { color: red; }
    </style>
</head>
<body>

<?php
// Recibir datos y sanitizarlos
$nombre = isset($_GET['nombreUsuario']) ? htmlspecialchars($_GET['nombreUsuario']) : '';
$clave  = isset($_GET['claveUsuario']) ? htmlspecialchars($_GET['claveUsuario']) : '';

// Lista de destinos
$provincia = ["index.html", "PantallaCajero.html", "Huelva"];

// Mostrar datos del usuario
echo "<h4>Comprobante Usuario y Contraseña</h4>";
echo "Nombre del Cliente: $nombre<br>";
echo "Clave ingresada: $clave<br>";

// Validación de contraseña
if ($clave === "1234") {
    $p = 1;
    echo "Saludos y bienvenido $nombre. Ha ingresado correctamente su información.<br>";
} else {
    $p = 0;
    echo "La contraseña introducida no es correcta.<br>";
}

// Mostrar destino correspondiente
echo "<br>Destino: " . $provincia[$p] . "<br>";
?>

<br>
<!-- Botón para continuar -->
<button onclick="window.location.href='<?php echo $provincia[$p]; ?>';">Siguiente...</button>

<hr class="red">
<p>La parte sobre la línea roja corresponde a los datos procesados en el lado Servidor.<br>
Esta parte <span style="border: 2px solid red">NO AMARILLA</span> debajo de la línea son los datos disponibles en el lado Cliente.<br>
En este caso, por ejemplo, el dato necesario para continuar con el enlace del botón "Siguiente" se muestra a continuación:</p>
<p id="GoToDestino"></p>

<script type="text/javascript">
    // Mostrar el destino también en el lado cliente
    var destino = "<?php echo $provincia[$p]; ?>";
    document.getElementById("GoToDestino").textContent = destino;
</script>

<footer>
    <hr class="yellow">
    <p><mark class="custom">Recordatorio de los ejercicios de variables PHP que nos daban a conocer los modos de recibir en el lado Cliente los datos provenientes del lado Servidor</mark></p>
    <nav>
        <a href="ejercicio_1.php">Ejercicio 1</a>
        <a href="ejercicio_2.php"><mark>Ejercicio 2</mark></a>
        <a href="ejercicio_3.php">Ejercicio 3</a>
        <a href="ejercicio_4.php">Ejercicio 4</a>
        <a href="ejercicio_5.php">Ejercicio 5</a>
        <a href="ejercicio_6.php">Ejercicio 6</a>
    </nav>
</footer>

</body>
</html>
