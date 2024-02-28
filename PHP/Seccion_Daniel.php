<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>Seccion#1 - Cifrando Digitos</h2>

<form action="Seccion_Daniel.php" method="post">

<input type="text" name="numero" placeholder="Ingrese un numero">
</br>
</br>
<button type="submit">Cifrar</button>

</form>
    
</body>
</html>

<?php

if($_POST){

    $numero = $_POST['numero'];

    $numero = (string)$numero;

    $numero = str_split($numero);

    function sumaMod($i){

        $num = $i + 7;

        return $num % 10;
    }

    $numero = array_map('sumaMod', $numero);

    $array[0] = $numero[2];

    $array[1] = $numero[3];

    $array[2] = $numero[0];

    $array[3] = $numero[1];

    print_r("</br> El numero cifrado es: ".join("", $array)) ;

}


    
?>