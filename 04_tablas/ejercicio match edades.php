<!DOCTYPE html>
<head>

    <meta charset="UTF-8">
    <title>Ejercicio Match</title>
</head>
<body>
    
    <?php
    $edad=rand(-10,140);
    //con if 
    /*
    if($edad>=0 && $edad <=4) echo "bebe";
    elseif($edad>4 && $edad<18) echo "menor";
    elseif($edad>=18 && $edad<=65)  echo "adulto";
    elseif($edad>65 && $edad<=120)  echo "jubilado";
    else echo "La edad está fuera de rango, es un ERROR";
    */
    //con match 
    
    $resultado=match(true){
        $edad <=0 and $edad <= 4 => "bebe",
        $edad <=5 and $edad <= 17 => "menor",
        $edad <=18 and $edad <= 65 => "adulto",
        $edad <=66 and $edad <= 120 => "jubilado",
        default => "ERROR"
    };
    echo "<p>$resultado</p>";
    ?>
</body>
</html>