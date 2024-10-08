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
<!--
Crear un formulario que reciba dos valore, el nombre y la edad de una persona
si la persona tiene:
<18 años , se mostrará "X ES MENOR DE EDAD"(X es el nombre)
>=18 años && < 65 -> "X ES MAYOR DE EDAD"
>=65  -> "X ES JUBILADO"
-->
    <form action="" method="post">
        <p>NOMBRE:</p><input type="text" name="nombre">
        <p>EDAD(años):</p><input type="number" name="edad" >
        <input type="submit" value="Enviar">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $nombre = $_POST["nombre"];
        $edad = (int)$_POST["edad"];
        if($edad<18){
            echo "$nombre es menor de edad";
        }
        elseif($edad>=18&&$edad<65){
            echo "$nombre es mayor de edad";
        }
        elseif($edad>65){
            echo "$nombre está jubilado";
        }
        /**
         * $resultado = match(true){
         *      $edad < 18 => "es menor de edad",
         *      $edad >= 18 and $edad < 65 => "es mayor de edad",
         *      $edad > 65 => "esta jubilado"
         * }
         * echo $resultado
         */
        
    }
    ?>
</body>
</html>