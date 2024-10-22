<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>varios formularios</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );

    require('../05 funciones/comprobar_edad.php');
    require('../05 funciones/calcular_potencia.php');
    ?>
</head>
<body>
    <h1>Formulario edad</h1>
    <form action="" method="post">
        <label for="nom">NOMBRE</label>
        <input type="text" name="nombre"><br><br>
        <label for="ed">EDAD</label>
        <input type="text" name="edad"><br><br>
        <input type="hidden" name="accion" value="formulario_edad">
        <input type="submit" value="Comprobar"><br><br>
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["accion"]=="formulario_edad"){
            $nombre=$_POST["nombre"];
            $edad=$_POST["edad"];
            comprobar_edad($nombre,$edad);
        }
    }
    ?>
    <h1>Formulario potencia</h1>
    <form action="" method="post">
        <label for="bas">BASE</label>
        <input type="text" name="base"><br><br>
        <label for="exp">EXPONENTE</label>
        <input type="text" name="exponente"><br><br>
        <input type="hidden" name="accion" value="formulario_potencia">
        <input type="submit" value="Calcular"><br><br>
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["accion"]=="formulario_potencia"){
            $base=$_POST["base"];
            $exponente=$_POST["exponente"];
            calcular_potencia($base,$exponente);
            
        }
        
    }
    ?>
</body>
</html>