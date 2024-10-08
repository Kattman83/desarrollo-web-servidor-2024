<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Formularios</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    /**
     *  SINGLE PAGE FORM -> TODA LLLA INFORMACION SE PROCESA EN LA MISMA PAGINA
     * 
     *  MULTI PAGE FORM -> REENVIAN A OTRA PAGINA
     */
    ?>
</head>
<body>
    
    <form action="" method="post">
        <p>mensaje a enviar:</p><input type="text" name="mensaje">
        <p>veces que se va a repetir:</p><input type="number" name="veces" >
        <input type="submit" value="Enviar">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        /**
         * El servidor ejecutará este bloque de codigo cuando reciba 
         * uuna peticion a traves del petodo POST
         */
        $mensaje = $_POST["mensaje"];
        $veces = (int)$_POST["veces"];
        for($i=0;$i<$veces;$i++){
            echo "<h1>$mensaje</h1>";
        }
        /**
         * Modificar el formulario anterior para que se pueda introducir
         * tambien un numero
         * 
         * El mensaje se mostrará tantas veces como indique el numero
         * 
         * 
         * 
         */
    }
    ?>
</body>
</html>