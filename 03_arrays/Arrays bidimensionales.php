<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Arrays bidimensionales</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
    $videojuegos = [
        ["FC 24","Deporte",70],
        ["Dark souls","Soulslike", 50],
        ["Hollow Knight","Plataformas",30]
    ];
    /*foreach($videojuegos as $videojuego){
        print_r($videojuego);
    }*/
    foreach($videojuegos as $videojuego){
        list($titulo, $categoria, $precio)=$videojuego;
        echo "<p>$titulo, $categoria, $precio</p>";
    }

    ?>
</body>
</html>