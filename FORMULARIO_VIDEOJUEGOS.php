<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>EJERCICIO DE CLASE FORMULARIO VIDEOJUEGOS</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <h1>EJERCICIO CLASE FORMULARIO VIDEOJUEGOS</h1>
    
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $tmp_titulo=$_POST["titulo"];
        $tmp_consola=$_POST["consola"];
        $tmp_descripcion=$_POST["descripcion"];
        $tmp_fechaL=$_POST["fechaL"];

        if($tmp_titulo==''){
            $err_titulo="El titulo es obligatorio";
        }else{
            $patron="/^[a-zA-Z0-9]{1,60}$/";
            if(!preg_match($patron,$tmp_titulo)){
                $err_titulo="El titulo solo puede tener letras, numeros y máximo 60 caracteres";
            }else{
                $titulo=$tmp_titulo;
            }

        }

        if($tmp_consola==''){
            $err_consola="La consola es obligatoria";
        }else{
            $consola=$tmp_consola;
        }

        if($tmp_descripcion!=''){
            $patron="/^[a-zA-Z0-9]{}";
            if(!preg_match($patron,$tmp_descripcion)){
                $err_descripcion="La descripción debe tener un máximo de 255 caracteres";
            }
            else{
                $descripcion=$tmp_descripcion;
            }
        }
        
    }
    ?>
    <form action="" method="post">
        <label for="titulo" ><h3>Titulo del videojuego</h3></label>
        <input type="text" name="titulo" id="titulo">
        <?php if(isset($err_titulo)) echo "<span class='error'>$err_titulo</span>"; ?>
        <br><br>
        <h3>Consola</h3>
            <label>
            <input type="radio" name="consola" value="PC">PC
            </label><br><br>
            <label>
            <input type="radio" name="consola" value="Nintendo Switch">Nintendo Switch
            </label><br><br>
            <label>
            <input type="radio" name="consola" value="PS4">PS4
            </label><br><br>
            <label>
            <input type="radio" name="consola" value="PS5">PS5
            </label><br><br>
            <label>
            <input type="radio" name="consola" value="Xbox Series X">Xbox Series X
            </label><br><br>
            <label>
            <input type="radio" name="consola" value="Xbox Series S">Xbox Series S
            </label>
            <?php if(isset($err_consola)) echo "<span class='error'>$err_consola</span>"; ?>
            <br><br>
        <label for="descripcion"><h3>Descripción (opcional)</h3></label>
        <textarea name="descripcion" id="descripcion" rows="4" cols="30" placeholder="Escribe aquí la descripción del videojuego..."></textarea>
        <?php if(isset($err_descripcion)) echo "<span class='error'>$err_descripcion</span>"; ?>
        <br><br>
        <label for="fechaL"><h3>Fecha lanzamiento</h3></label>
        <input type="date" name="fechaL" id="fechaL">
        <?php if(isset($err_fechaL)) echo "<span class='error'>$err_fechaL</span>"; ?>
        <br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>