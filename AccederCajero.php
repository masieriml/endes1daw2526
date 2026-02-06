<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso al Cajero</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gradient-to-r from-pink-300 via-purple-300 to-indigo-400 min-h-screen flex flex-col items-center justify-center font-sans text-gray-800">

    <main class="bg-white/90 p-8 rounded-3xl shadow-2xl text-center max-w-lg w-full space-y-6">
        
        <h2 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-pink-600 to-purple-600 mb-4">
            Verificación de Acceso
        </h2>

        <div class="space-y-4 text-left bg-gray-50 p-6 rounded-xl border border-gray-200 shadow-inner">
            <?php
// Recuperamos datos con seguridad básica (htmlspecialchars para evitar XSS simple)
$nombre = isset($_GET['nombreUsuario']) ? htmlspecialchars($_GET['nombreUsuario']) : "Desconocido";
$clave = isset($_GET['claveUsuario']) ? htmlspecialchars($_GET['claveUsuario']) : "";
$provincia = array("index.html", "PantallaCajero.php", "Huelva");

echo "<p class='text-lg'><strong>Nombre del Cliente:</strong> <span class='text-purple-700'>" . $nombre . "</span></p>";
// Opcional: No mostrar la clave en texto plano por seguridad, pero se mantiene por compatibilidad con el ejercicio
echo "<p class='text-lg'><strong>Clave ingresada:</strong> <span class='font-mono bg-gray-200 px-2 rounded'>" . $clave . "</span></p>";

$mensaje = "";
$destinoIndex = 0;
$claseAlerta = "";

if ($clave == "1234") {
  $mensaje = "Saludos y bienvenido <span class='font-bold'>" . $nombre . "</span>. Ha ingresado correctamente su información.";
  $destinoIndex = 1; // PantallaCajero.php
  $claseAlerta = "bg-green-100 text-green-800 border-green-300";
}
else {
  $mensaje = "La contraseña introducida no es correcta.";
  $destinoIndex = 0; // index.html (o volver)
  $claseAlerta = "bg-red-100 text-red-800 border-red-300";
}
?>
            
            <div class="p-4 rounded-lg border-l-4 <?php echo $claseAlerta; ?> mt-4">
                <p><?php echo $mensaje; ?></p>
            </div>
            
            <p class="text-sm text-gray-500 mt-2">
                Destino técnico: <code class="bg-gray-100 px-1 rounded"><?php echo $provincia[$destinoIndex]; ?></code>
            </p>
        </div>

        <div class="mt-8">
            <button onclick="window.location.href='<?php echo $provincia[$destinoIndex]; ?>';" 
               class="w-full bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 
                      hover:from-pink-600 hover:via-red-600 hover:to-yellow-600 
                      text-white font-bold py-3 px-8 rounded-full shadow-lg transition-transform transform hover:scale-105 cursor-pointer">
                Siguiente...
            </button>
        </div>

        <!-- Sección didáctica (conservada pero estilizada) -->
        <hr class="border-t-2 border-red-400 my-6">
        
        <div class="text-sm text-gray-600 space-y-2">
            <p class="mb-2">
                La parte superior corresponde a datos procesados en el lado <strong>Servidor (PHP)</strong>.
            </p>
            <p class="mb-2 p-2 border-2 border-red-400 bg-red-50 rounded-lg">
                Esta sección está disponible en el lado <strong>Cliente (JS/HTML)</strong>.
            </p>
            
            <p>Dato para "Siguiente": <span id="GoToDestino" class="font-mono font-bold text-purple-600"></span></p>
        </div>

        <script type="text/javascript">
            var destino = "<?php echo $provincia[$destinoIndex]; ?>";
            function myDestino(val) {
                return val;
            }
            document.getElementById("GoToDestino").innerHTML = myDestino(destino);
        </script>
    </main>

    <footer class="mt-8 text-center bg-white/60 p-4 rounded-xl backdrop-blur-sm">
        <p class="text-xs text-red-600 font-semibold mb-2">Recordatorio de ejercicios de variables PHP</p>
        <div class="flex flex-wrap justify-center gap-3 text-sm">
            <a href="ejercicio_1.php" class="text-blue-600 hover:underline">Ejercicio 1</a>
            <a href="ejercicio_2.php" class="bg-yellow-200 px-2 rounded hover:bg-yellow-300">Ejercicio 2</a>
            <a href="ejercicio_3.php" class="text-blue-600 hover:underline">Ejercicio 3</a>
            <a href="ejercicio_4.php" class="text-blue-600 hover:underline">Ejercicio 4</a>
            <a href="ejercicio_5.php" class="text-blue-600 hover:underline">Ejercicio 5</a>
            <a href="ejercicio_6.php" class="text-blue-600 hover:underline">Ejercicio 6</a>
        </div>
    </footer>

</body>
</html>
