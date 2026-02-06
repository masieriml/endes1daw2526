<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cajero Bancario</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    
    <?php
// Variables iniciales en PHP (Lado Servidor)
$libreta = 81; // Saldo inicial
$cargoLuz = 45; // Deuda de luz
$cargoAgua = 27; // Deuda de agua (Agregado)
?>

    <script>
        // Variables de saldo y cargos (Inyectadas desde PHP)
        var decidir = " euros es ahora el saldo de su libreta.";
        var libreta = <?php echo $libreta; ?>;
        var cargoLuz = <?php echo $cargoLuz; ?>;
        var cargoAgua = <?php echo $cargoAgua; ?>; // Variable para el agua
        var abono01 = 0;
        var abono02 = 0;
        var minus = 0;
        var saldo = libreta + abono01;

        // Función para calcular el nuevo saldo tras el pago
        function myPago(libreta, minus) {
            return (libreta - minus) + decidir;
        }
        
        // Función para actualizar el saldo visualmente tras el pago y ocultar la deuda
        function pagarServicio(monto, idDiv) {
            minus = monto;
            var nuevoSaldo = libreta - minus;
            
            // Actualizar Saldo Visual
            document.getElementById('Riendo1').innerHTML = nuevoSaldo;
            
            // Actualizar Saldo Lógico (variable global)
            libreta = nuevoSaldo;
            
            // Mostrar mensaje de resultado
            document.getElementById('resultado').innerHTML = myPago(libreta + monto, minus); // +monto para que el mensaje use el saldo anterior en la resta mostrada si fuese el caso, o simplemente usamos myPago logic. 
            // Corrección: myPago usa 'libreta' que pasamos. Si ya restamos antes a la global, pasamos saldo anterior?
            // La función original myPago era: return libreta - minus + decidir;
            // Si pasamos el saldo ya restado, resta doble.
            // Mejor pasamos el saldo actual (global ya actualizada) + monto (para simular el anterior)?? 
            // Simplifiquemos: myPago solo devuelve texto.
            // document.getElementById('resultado').innerHTML = (nuevoSaldo) + deciding; -> ya lo hace myPago si le pasamos los datos.
            
            // Como myPago hace la resta dentro, le pasamos el saldo ANTERIOR (libreta + monto) y el cargo (monto).
            document.getElementById('resultado').innerHTML = myPago(libreta + minus, minus);


            // Ocultar la sección de la deuda con animación
            var elemento = document.getElementById(idDiv);
            if(elemento) {
                elemento.style.transition = "opacity 0.5s ease-out";
                elemento.style.opacity = "0";
                setTimeout(function(){
                    elemento.style.display = "none";
                }, 500);
            }
        }
    </script>
</head>

<body class="bg-gradient-to-r from-pink-300 via-purple-300 to-indigo-400 min-h-screen flex flex-col items-center justify-center font-sans">

    <!-- Contenedor principal -->
    <main class="bg-white/80 p-8 rounded-3xl shadow-xl text-center max-w-xl w-full space-y-6">
        <!-- Inicio de sesión -->
        <p class="bg-pink-100 p-3 rounded-lg">
            <i>Inicio de sesión: <span id="Riendo0"></span></i>
        </p>

        <script>
            var session = new Date();
            document.getElementById("Riendo0").innerHTML = session;
        </script>

        <!-- Saldo y cargos -->
        <p class="text-lg">
            El Saldo actual de su Libreta Bancaria es: <span id="Riendo1" class="font-semibold"></span><i> euros.</i>
        </p>
        <hr class="border-gray-300">
        
        <!-- Deuda LUZ -->
        <div id="divLuz" class="bg-yellow-50 p-4 rounded-xl border border-yellow-200 transition-all duration-500">
            <p class="text-lg mb-2">
                Por servicios de electricidad tiene pendiente un pago de: <span id="Riendo2" class="font-semibold"></span><i> euros.</i>
            </p>
            <p class="text-sm font-medium text-gray-600 mb-2">¿Desea realizar el pago de la LUZ ahora?</p>
            <button onclick="pagarServicio(cargoLuz, 'divLuz')"
                    class="bg-gradient-to-r from-yellow-400 to-orange-500 hover:from-yellow-500 hover:to-orange-600 
                           text-white font-bold py-2 px-6 rounded-full shadow-md transition-transform transform hover:scale-105 cursor-pointer">
                Pagar Luz
            </button>
        </div>

        <!-- Deuda AGUA (Nueva sección) -->
        <div id="divAgua" class="bg-blue-50 p-4 rounded-xl border border-blue-200 transition-all duration-500">
            <p class="text-lg mb-2">
                Por servicios de agua tiene pendiente un pago de: <span id="Riendo3" class="font-semibold"></span><i> euros.</i>
            </p>
            <p class="text-sm font-medium text-gray-600 mb-2">¿Desea realizar el pago del AGUA ahora?</p>
            <button onclick="pagarServicio(cargoAgua, 'divAgua')"
                    class="bg-gradient-to-r from-blue-400 to-cyan-500 hover:from-blue-500 hover:to-cyan-600 
                           text-white font-bold py-2 px-6 rounded-full shadow-md transition-transform transform hover:scale-105 cursor-pointer">
                Pagar Agua
            </button>
        </div>

        <script>
            document.getElementById('Riendo1').innerHTML = saldo;
            document.getElementById('Riendo2').innerHTML = cargoLuz;
            document.getElementById('Riendo3').innerHTML = cargoAgua; // Mostrar deuda agua
        </script>

        <!-- Resultado del pago -->
        <p id="resultado" class="mt-4 font-semibold text-purple-700 text-xl bg-white p-2 rounded shadow-sm"></p>
    </main>
</body>
</html>
