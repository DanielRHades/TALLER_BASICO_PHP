<?php


$totalPersonas = 0;
$sumaEdades = 0;
$minimaEdad = PHP_INT_MAX;


echo "Ingrese las edades de las personas que asistieron:\n";
while (true) {
    $edad = intval(readline("Edad: "));
    
    
    if ($edad == 0) {
        break;
    }
    
    
    if ($edad > 0) {
        $totalPersonas++;
        $sumaEdades += $edad;
        if ($edad < $minimaEdad) {
            $minimaEdad = $edad;
        }
    } else {
        echo "Edad no válida. Por favor, ingrese una edad válida.\n";
    }
}


if ($totalPersonas > 0) {
    
    $promedioEdades = $sumaEdades / $totalPersonas;

    
    echo "\nResultados:\n";
    echo "a. Total de personas que asistieron a la fiesta: $totalPersonas\n";
    echo "b. Promedio de edades: $promedioEdades\n";
    echo "c. Edad de la persona más joven que asistió: $minimaEdad\n";
} else {
    echo "No se ingresaron edades válidas.\n";
}

?>
