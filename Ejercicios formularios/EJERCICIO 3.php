<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>EJERCICIO 3</title>
<!--
 Realiza un formulario que reciba dos números y devuelva 
 todos los números primos dentro de ese rango (incluidos los extremos).   
-->
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
<form action="" method="post">
<label for="numeros">Pon tres numeros</label><br><br>
        <p>NUMERO A</p><input type="number" name="a" id="a"><br><br>
        <p>NUMERO B</p><input type="number" name="b" id="b"><br><br>
        <br><br>
        <input type="submit" value="Numeros Primos">
        <br><br><br>
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $a=(int)$_POST["a"];
        $b=(int)$_POST["b"];
        $array=array();
        if($b<$a){//si $a es mayor que $b
            for($i=$b;$i<=$a;$i++){
                array_push($array, $i);
            }
        }
        elseif($a<$b){//si $b es mayor que $a
            for($i=$a;$i<=$b;$i++){
                array_push($array, $i);
            }
        }
        function esPrimo($numero){//funcion para comprobar si un numero es primo
            //honestamente, me cuesta mucho entender la logica para averiguar si un numero es primo
            //debo confesarte que me he apoyado en chat gpt para poder realizar el ejercicio
            //OJO, en ningun momento he hecho un copy/paste, solo consultar y escribir el codigo mirando para guiarme
            if($numero<=1){
                return false;
            }
            for ($i=2;$i<=sqrt($numero);$i++){
                if ($numero%$i==0){
                    return false;
                }
            }
            return true;
        }
        $numPrimos=array();
        foreach($array as $numero){
            if(esPrimo($numero)){
                array_push($numPrimos, $numero);
            }
        }
        echo "los numeros primos entre $a y $b son: ";
        foreach($numPrimos as $primo){
            echo "$primo, ";
        }
    }
    ?>
</body>
</html>