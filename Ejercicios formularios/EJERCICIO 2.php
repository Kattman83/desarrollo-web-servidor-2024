<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>EJERCICIO 2</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
    <!--
     Realiza un formulario que reciba 3 números: a, b y c. 
     Se mostrarán en una lista los múltiplos de c que se encuentren entre a y b.

Por ejemplo, si a = 3, b = 10, c = 2

Los múltiplos de 2 entre 3 y 10 son: 4, 6, 8 y 10
    -->
</head>
<body>
    <form action="" method="post">
    <label for="numeros">Pon tres numeros</label><br><br>
        <p>NUMERO A</p><input type="number" name="a" id="a"><br><br>
        <p>NUMERO B</p><input type="number" name="b" id="b"><br><br>
        <p>NUMERO C</p><input type="number" name="c" id="c"><br><br>
        <br><br>
        <input type="submit" value="Mostrar multiplos">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $a=(int)$_POST["a"];
        $b=(int)$_POST["b"];
        $c=(int)$_POST["c"];
        $array=array();
        $multiplos=array();
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
        echo "Numeros: ";
        print_r($array);
        for($j=0;$j<count($array);$j++){
            if(($array[$j])%$c==0){
                $multi=$array[$j];
                array_push($multiplos, ($array[$j]));
            }
        }
        echo "Multiplos: ";
        print_r($multiplos);
        echo "<p>";
        echo "Los multiplos de $c entre $a y $b son: ";
        foreach ($multiplos as $multiplo){
            echo "$multiplo, ";
        }
        echo "</p>";
    }
    ?>
</body>
</html>