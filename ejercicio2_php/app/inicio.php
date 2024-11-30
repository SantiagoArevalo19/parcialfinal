<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numVueltas = intval($_POST['numVueltas']);
    $tiempoA = floatval($_POST['tiempoA']);
    $tiempoB = floatval($_POST['tiempoB']);

    // Validaciones básicas
    if ($numVueltas < 1 || $tiempoA <= 0 || $tiempoB <= 0 || $tiempoA === $tiempoB) {
        die("Error: Verifique los valores ingresados.");
    }

    // Cálculos
    $resultados = [];
    for ($i = 1; $i <= $numVueltas; $i++) {
        $tiempoTotalA = $i * $tiempoA;
        $tiempoTotalB = $i * $tiempoB;
        if (fmod($tiempoTotalA, $tiempoB) === 0) {
            $resultados[] = [
                'vuelta' => $i,
                'tiempoA' => $tiempoTotalA,
                'tiempoB' => $tiempoTotalB,
            ];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Resultados</h1>
        <?php if (!empty($resultados)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Vuelta</th>
                        <th>Tiempo Corredor A (min)</th>
                        <th>Tiempo Corredor B (min)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultados as $resultado): ?>
                        <tr>
                            <td><?= htmlspecialchars($resultado['vuelta']) ?></td>
                            <td><?= htmlspecialchars($resultado['tiempoA']) ?></td>
                            <td><?= htmlspecialchars($resultado['tiempoB']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hubo coincidencias dentro del rango de vueltas especificado.</p>
        <?php endif; ?>
        <a href="index.php" class="button">Volver</a>
    </div>
</body>
</html>
