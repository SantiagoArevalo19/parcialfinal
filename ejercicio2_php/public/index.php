<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vueltas</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="container">
        <h1>Calcular tiempo corredores</h1>
        <form action="calcular.php" method="POST">
            <label for="vueltas">Número total de vueltas:</label>
            <input type="number" id="vueltas" name="vueltas" min="1" required>

            <label for="tiempoA">Tiempo por vuelta del corredor A (minutos):</label>
            <input type="number" id="tiempoA" name="tiempoA" min="1" required>

            <label for="tiempoB">Tiempo por vuelta del corredor B (minutos):</label>
            <input type="number" id="tiempoB" name="tiempoB" min="1" required>

            <button type="submit">Calcular</button>
        </form>
    </div>
    <script></script>
</body>
</html>
