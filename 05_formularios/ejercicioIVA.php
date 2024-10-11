<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio IVA</title>
    <?php
    define("GENERAL",1.21);
    define("REDUCIDO",1.10);
    define("SUPERREDUCIDO",1.04);

    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <form action="" method="post">
        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio"><br><br>
        <label for="iva">IVA</label>
        <select name="iva" id="iva">
            <option value="general">General</option>
            <option value="reducido">Reducido</option>
            <option value="superreducido">Superreducido</option>
        </select><br><br>
        <input type="submit" value="Calcular PVP">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $precio=(int)$_POST["precio"];
        $tipoIVA=$_POST["iva"];
        

        if($tipoIVA=="general"){
            $precioFinal=$precio*GENERAL;
            echo "El precio final es $precioFinal";
        }
        elseif($tipoIVA=="reducido"){
            $precioFinal=$precio*REDUCIDO;
            echo "El precio final es $precioFinal";
        }
        elseif($tipoIVA=="superreducido"){
            $precioFinal=$precio*SUPERREDUCIDO;
            echo "El precio final es $precioFinal";
        }
        /*
        $precioFinal=match($tipoIVA){
            "general" => $precio * GENERAL,
            "reducido" => $precio * REDUCIDO,
            "superreducido" => $precio * SUPERREDUCIDO
        };*/

    }
    
    ?>
</body>
</html>