<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>ejercicio clase</title>
<!-- POR HACER!!!
    crear con numeros aleatorios un array con 10 enteros del 1 al 50
    mostrar dichos numeros de la forma que mas veas conveniente
    crear un formulario donde se intente introdicr el maximo valor y se 
    compruebe si has acertado
    -->
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
    $numeros=[1,5,3,9,20,15,22,11];
    /**
     * mostrar el array
     */
    for($i=0;$i<count($numeros);$i++){
        echo "$numeros[$i], ";
    }
    ?>
    <form action="" method="post">
        <!--<p>NUMEROS=[1,5,3,9,20,15,22,11]</p>-->
        <p>INTRODUCE EL MAYOR:</p><input type="number" name="edad" >
        <input type="submit" value="COMPROBAR">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){

    }


    ?>
</body>
</html>