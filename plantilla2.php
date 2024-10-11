<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Plantilla 2</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
<form action="" method="post">
        <label for="precio">METER NUMERO O TEXTO</label>
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
        
    }
    ?>
</body>
</html>