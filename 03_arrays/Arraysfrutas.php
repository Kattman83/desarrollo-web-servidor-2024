<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Arrays personas</title>
    <?php
    /*error_reporting( E_ALL );
    ini_set( "display_errors", 1 );*/
    ?>
</head>
<body>
    <?php

    $frutas=array(
        "Naranja","Manzana","Pera"
    );
    print_r($frutas);

    array_push($frutas,"Cereza");
    
    print_r($frutas);
    ?>
</body>
</html>