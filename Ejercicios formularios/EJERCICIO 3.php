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
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $a=(int)$_POST["a"];
        $b=(int)$_POST["b"];
        $array=array();
        if($b<$a){
            for($i=$b;$i<=$a;$i++){
                array_push($array, $i);
            }
        }
        elseif($a<$b){
            for($i=$a;$i<=$b;$i++){
                array_push($array, $i);
            }
        }
        function esPrimo($numero){//funcion para comprobar si un numero es primo
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
    }
    ?>
</body>
</html>