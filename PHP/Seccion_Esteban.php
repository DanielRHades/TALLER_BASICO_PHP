<?php
session_start();

// Inicialización de lista de edades si no existe
if (!isset($_SESSION['edades'])) {
    $_SESSION['edades'] = [];
}

// Si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener la edad ingresada desde el formulario
    $nuevaEdad = intval($_POST["edad"]);

    // Verificar si la edad es válida (mayor o igual a cero)
    if ($nuevaEdad >= 18) {
        // Agregar la edad a la lista
        $_SESSION['edades'][] = $nuevaEdad;
    } else {
        echo "<p class='error'>La edad no es suficiente para ingresar.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de edades de fiesta</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1 class="titulo">Calculadora de edades de fiesta</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="edad">Ingrese la edad de la persona que asistió a la fiesta:</label><br>
            <input type="number" id="edad" name="edad" min="1" required><br><br>
            <input type="submit" value="Agregar Edad">
        </form>

        <?php
        // Verificar si se ingresaron edades
        if (!empty($_SESSION['edades'])) {
            // Calcular el total de personas y la suma de edades
            $totalPersonas = count($_SESSION['edades']);
            $sumaEdades = array_sum($_SESSION['edades']);

            // Calcular el promedio de edades
            $promedioEdades = $sumaEdades / $totalPersonas;

            // Encontrar la edad mínima
            $minimaEdad = min($_SESSION['edades']);

            // Mostrar resultados
            echo "<div class='resultados'>";
            echo "<p>a. Total de personas que asistieron a la fiesta: $totalPersonas</p>";
            echo "<p>b. Promedio de edades: $promedioEdades</p>";
            echo "<p>c. Edad de la persona más joven que asistió: $minimaEdad</p>";
            echo "</div>";
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<p class='error'>No se ingresaron edades válidas.</p>";
        }
        ?>
    </div>
</body>
</html>
