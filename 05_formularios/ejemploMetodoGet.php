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
    <form action="" method="get">
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
        //ISSET

        
        
        if(isset($_GET["precio"])and isset($_GET["iva"])){
            $precio=(int)$_GET["precio"];
            $tipoIVA=$_GET["iva"];
            if($precio!='' and $tipoIVA!=''){
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
            }
            else{
                echo "<p>Por favor, rellena todos los datos</p>";
            }
        }
            
        
        /*ESTRUCTURA MATCH
        $precioFinal=match($tipoIVA){
            "general" => $precio * GENERAL,
            "reducido" => $precio * REDUCIDO,
            "superreducido" => $precio * SUPERREDUCIDO
        };*/

    
    
    ?>
</body>
</html>