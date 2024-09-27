<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <?php
    define("EDAD",25);
    $var= "HOLA WORLD";
    //echo $var;
    //echo es para imprimir por pantalla
    var_dump($var);

    echo EDAD;
//br salto de linea
    echo "<br>"; 

    echo "<h2 style='color: orange'>La varianble es $var</h2>";

    $frase1 ="hola";
    $frase2 ="mundo";
    
    echo $frase1 . $frase2;

    ?>
</body>
</html>