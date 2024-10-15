<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 4</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
<!--
Realiza un formulario que funcione a modo de conversor de temperaturas. 
Se introducirá en un campo de texto la temperatura, y luego 
tendremos un select para elegir las unidades de dicha temperatura, 
y otro select para elegir las unidades a las que queremos convertir la temperatura.

Por ejemplo, podemos introducir "10", y seleccionar "CELSIUS", 
y luego "FAHRENHEIT". Se convertirán los 10 CELSIUS a su equivalente en FAHRENHEIT.

En los select se podrá elegir entre: CELSIUS, KELVIN y FAHRENHEIT.


-->
<form action="" method="post">
        <label for="precio">METER NUMERO O TEXTO</label>
        <input type="text" name="temperatura" placeholder="temperatura"><br><br>
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