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
    <?php
    $productos=[
        ["Nintendo Switch",300],
        ["PS 5",450],
        ["PS 5 pro",800],
        ["Xbox S",300],
        ["Xbox X",400]
    ];
    for ($i=0;$i<count($productos);$i++){
        $aleatorio=rand(0,5);
        array_push($productos[$i],$aleatorio);
    }
    ?>
    <form action="" method="post">
        <p>["Nintendo Switch",300],
        ["PS 5",450],
        ["PS 5 pro",800],
        ["Xbox S",300],
        ["Xbox X",400]</p>
        <p>INTRODUCE producto:</p><input type="string" name="prod" >
        <input type="submit" value="ver disponibilidad">
    </form>
    <?php
    
    /**
     * añadir al array una tercera columna que será el stock, y se generará 
     * con un rand en 0 y 5
     * mostrar en una tabla cada producto junto a su precio y stock
     * crear un formulario donde se introduzca el nombre de un producto y
     * -si hay stock que diga que está disponible y su precio
     * -si no hay, decimos que está agotado
     * 
     */

    

    foreach($productos as $producto){
        list($nombre, $precio, $stock)=$producto;
        echo "<p>$nombre, $precio, $stock</p>";
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $prodstock=$_POST["prod"];
        $encontrado=false;
        for($i=0;$i<count($productos)&&$encontrado==false;$i++){
            if ($productos[$i]==$prodstock){
                if($productos[$i][2]>0){
                    echo "el producto está en stock ";
                }
                else{
                    echo "el producto NO está en stock ";
                }
                $encontrado=true;
            }
        }

    }
    ?>
</body>
</html>