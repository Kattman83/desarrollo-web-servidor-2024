<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <?php
    
    $numero=13;
    
    # Rangos: [-10,0],[0,10],[10,20]
    if($numero >= -10 && $numero < 0){
        echo "El número $numero está en el rango [-10,0]";
    }elseif($numero >= 0 and $numero <= 10){
        echo "El número $numero está en el rango [0,10]";
    }elseif($numero > 10 and $numero <= 20){
        echo "El número $numero está en el rango [10,20]";
    }else{
        echo "El número $numero no esta en ningun rango";
    }

    echo "<br>";
    echo "<br>";
    echo "<br>";

    #Rangos v2

    if($numero >= -10 && $numero < 0):
        echo "El número $numero está en el rango [-10,0]";
    elseif($numero >= 0 and $numero <= 10):
        echo "El número $numero está en el rango [0,10]";
    elseif($numero > 10 and $numero <= 20):
        echo "El número $numero está en el rango [10,20]";
    else:
        echo "El número $numero no esta en ningun rango";
    endif;

    echo "<br>";
    echo "<br>";
    echo "<br>";

    $numero1=3;
    $numero2=4;
    if($numero1<$numero2) echo "El $numero1 es menor que el $numero2";
    elseif($numero>$numero2) echo "El $numero1 es mayor que el $numero2";
    else echo "los numeros son iguales, o son el mismo numero";


    ?>

    
</body>
</html>