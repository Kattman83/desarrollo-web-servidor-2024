<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>clases de la semana</title>
</head>
<body>
    <?php
    //averiguar si un numero es primo
    function esPrimo($num){
        $esPrimo=true;
        for($i=2;$i<= sqrt($numero);$i++){
            if($numero%$i==0){
            return false;
            }
        }
        return true;
    }
    $primos=[];
    $numero=2;
    while (count($primos)<50){
        if(esPrimo($numero)){
            $primos[]=$numero;
        }
        $numero++;
    }
    echo "Los primeros 50 numeros primos son: ";
    foreach($primos as $primo){
        echo $primo . ", ";
    }

    ?>
</body>
</html>