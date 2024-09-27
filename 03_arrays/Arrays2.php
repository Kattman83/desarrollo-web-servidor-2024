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

    $personas=array(
        "25865478-j"=> "Fulanito Gómez",
        "35641258-l"=> "Menganito Pérez",
        "23248465-k"=> "Anonimo Sánchez"
    );
    print_r($personas);

    echo $personas["35641258-l"];
    /*array_values --> reordena el array */
    ?>
</body>
</html>