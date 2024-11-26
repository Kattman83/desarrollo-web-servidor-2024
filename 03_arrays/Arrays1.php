<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Arrays</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
    /*$frutas=array(

        1=>"Manzana",
        2=>"Naranja",
        3=>"Cereza",
); */
    $frutas=[
        "Manzana",
        "Naranja",
        "Cereza",
    ];
    echo $frutas[0];
    /*print_r($frutas);*/
    ?>
</body>
</html>