<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );

        require('../05 funciones/calcular_salario_neto.php');
    ?>
</head>
<body>
    <h1>Formulario IRPF</h1>
    <form action="" method="post">
        <label for="sueldo_bruto">Mete tu sueldo anual</label>
        <input type="number" name="bruto" id="bruto"><br><br>
        <br><br>
        <input type="submit" value="Calcular IRPF">
        <br><br>
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $temp_bruto=(int)$_POST["bruto"];
        /*echo "$temp_bruto";*/
        if($temp_bruto==''){
            echo"<p>Porfavor introduce un salario valido</p>";
        }elseif(filter_var($temp_bruto, FILTER_VALIDATE_INT) === false){
            echo "<p>El salario bruto debe ser un número entero</p>";
            if($temp_bruto <= 0) {
                echo "<p>El salario debe ser mayor que 0</p>";
                
            }
        }else{
            calcular_salario_neto($temp_bruto);
        }
    }
    ?>
</body>
</html>