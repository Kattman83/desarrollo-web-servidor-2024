<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>EJERCICIO 1</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
    <!--Realiza un formulario que reciba 3 números y 
    devuelva el mayor de ellos.-->

</head>
<body>
    <form action="" method="post">
        <label for="numeros">Numeros, pon tres numeros</label><br><br>
        <input type="number" name="numero1" id="numero1"><br><br>
        <input type="number" name="numero2" id="numero2"><br><br>
        <input type="number" name="numero3" id="numero3"><br><br>
        <br><br>
        <input type="submit" value="Buscar el Mayor">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $numero1=(int)$_POST["numero1"];
        $numero2=(int)$_POST["numero2"];
        $numero3=(int)$_POST["numero3"];
        $numeros=array($numero1,$numero2,$numero3);
        $mayor=0;
        for($i=0;$i<count($numeros);$i++){
            if ($numeros[$i]>$mayor){
                $mayor=$numeros[$i];
            }
        }
        echo "El mayor es $mayor";
    }
    ?>
</body>
</html>