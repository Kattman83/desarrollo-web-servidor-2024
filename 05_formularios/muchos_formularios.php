<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>muchos formularios</title>
    <?php
    define("GENERAL",1.21);
    define("REDUCIDO",1.10);
    define("SUPERREDUCIDO",1.04);

    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    require('../05 funciones/calcular_precio_iva.php');
    require('../05 funciones/calcular_salario_neto.php');
    require('../05 funciones/comprobar_es_primo.php');

    ?>
</head>
<body>
    <h1>CALCULAR PRECIO CON IVA</h1>
    <form action="" method="post">
    <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio"><br><br>
        <label for="iva">IVA</label>
        <select name="iva" id="iva">
            <option value="general">General</option>
            <option value="reducido">Reducido</option>
            <option value="superreducido">Superreducido</option>
        </select><br><br>
        <input type="hidden" name="accion" value="iva">
        <input type="submit" value="Calcular PVP">
        
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["accion"]=="iva"){
            $precio=(int)$_POST["precio"];
            $tipoIVA=$_POST["iva"];
            calcular_precio_iva($precio,$tipoIVA);
        }
    }
    ?>
    <h1>CALCULAR SALARIO NETO</h1>
    <form action="" method="post">
        <label for="sueldo_bruto">Mete tu sueldo anual</label>
        <input type="number" name="bruto" id="bruto"><br><br>
        <br><br>
        <input type="hidden" name="accion" value="neto">
        <input type="submit" value="Calcular IRPF">
        <br><br>
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["accion"]=="neto"){
            $bruto=(int)$_POST["bruto"];
            calcular_salario_neto($bruto);
        }
        
        
    }
    ?>

    <h1>CALCULAR NUMEROS PRIMOS ENTRE UN RANGO</h1>
    <form action="" method="post">
    <label for="numeros">Pon DOS numeros</label><br><br>
        <p>NUMERO A</p><input type="number" name="a" id="a"><br><br>
        <p>NUMERO B</p><input type="number" name="b" id="b"><br><br>
        <br><br>
        <input type="hidden" name="accion" value="pri">
        <input type="submit" value="Numeros Primos">
        <br><br><br>
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["accion"]=="pri"){
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
    }

    ?>
</body>
</html>