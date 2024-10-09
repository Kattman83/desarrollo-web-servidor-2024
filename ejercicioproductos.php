<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Plantilla</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <form action="" method="post">
        
        <p>INTRODUCE NUMERO:</p><input type="number" name="num" >
        <input type="submit" value="CREAR TABLA">
    </form>
    <?php
    $productos=[
        ["Nintendo Switch",300],
        ["PS 5",450],
        ["PS 5 pro",800],
        ["Xbox S",300],
        ["Xbox X",400]
    ];
    /**
     * añadir al array una tercera columna que será el stock, y se generará 
     * con un rand en 0 y 5
     * mostrar en una tabla cada producto junto a su precio y stock
     * crear un formulario donde se introduzca el nombre de un producto y
     * -si hay stock que diga que está disponible y su precio
     * -si no hay, decimos que está agotado
     * 
     */

    for ($i=0;$i<count($productos);$i++){
        $aleatorio=rand(0,5);
        array_push($productos[$i],$aleatorio);
    }

    for($i=0;$i<count($productos);$i++){
        echo "$productos[$i] \n";
    }
    ?>
</body>
</html>