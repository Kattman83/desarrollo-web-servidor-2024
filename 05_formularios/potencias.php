<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Potencias</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <!--
    CREAR UN FORMULARIO QUE RECIBA DOS NUMEROS:. BASEY EXPONENTE
    SE MOSTRARÁ EL RESULTADO DE ELEVAR LA BASE AL EXPONENTE
    -->
    <form action="" method="post">
        <p>PRIMER NUMERO(BASE):</p><input type="number" name="base" >
        <p>SEGUNFO NUMERO(EXPONENTE):</p><input type="number" name="exponente" >
        <input type="submit" value="Enviar">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $base= (int)$_POST["base"];
        $exponente= (int)$_POST["exponente"];
        $res=pow($base,$exponente);
        echo "El numero $base elevado a $exponente es igual a $res <br>";
        $resultado=1;
        for($i=0;$i<$exponente;$i++){
            $resultado = $resultado*$base;
            echo "$i . $base elevado a $i es $resultado <br>-";
        }
    }
    ?>
</body>
</html>