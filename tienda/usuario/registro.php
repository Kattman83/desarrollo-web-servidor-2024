<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('../util/conexion.php');
    ?>
</head>
<body>
    <?php 
    

    if($_SERVER["REQUEST_METHOD"]== "POST"){
        //validacion usuario
        $tmp_usuario=$_POST["usuario"];
        if($tmp_usuario===""){
            $err_usuario="<h2>Es obligatorio poner el nombre de usuario</h2>";
        }else if(strlen($tmp_usuario)>15||strlen($tmp_usuario)<3){
            $err_usuario="<h2>El nombre de usuario no puede tener más de 15 caracteres ni tampoco puede tener menos de tres</h2>";
        }else{
            $patron="/^[a-zA-Z0-9]+$/";
            if(!preg_match($patron, $tmp_usuario)){
                $err_usuario="<h2>El nombre de usuario solo admite letras y numeros</h2>";
            }else{
                $sql="SELECT * FROM usuarios";
                $resultado = $_conexion -> query($sql);
                $usuarios=[];
                while($fila = $resultado -> fetch_assoc()) {
                    array_push($usuarios,$fila["usuario"]);
                }
                if(in_array($tmp_usuario,$usuarios)){
                    $err_usuario="<h2>Este nombre ya esta usado por otro usuario, por favor elige otro</h2>";
                }else{
                    $usuario=$tmp_usuario;
                }
            }
        }
        //validacion contraseña
        $tmp_contrasena=$_POST["contrasena"];
        if($tmp_contrasena===""){
            $err_contrasena="<h2>La contrasena es obligatoria</h2>";
        }else if(strlen($tmp_contrasena)>15||strlen($tmp_contrasena)<8){
            $err_contrasena="<h2>La contraseña no puede tener más de 15 caracteres ni tampoco menos de 8 caracteres</h2>";
        }else{
            $patron="/^(?=.*[a-z])(?=.*[A-Z])[0-9\w\W]+$/";
            if(!preg_match($patron, $tmp_contrasena)){
                $err_contrasena="<p>La contraseña solo admite obligatoriamente minimo una letra mayúscula y una letra minuscula, además tambien puede llevar caracteres especiales y numeros</p>";
            }else{
                $contrasena=$tmp_contrasena;
                //para cifrar la contraseña
                $contrasena_cifrada= password_hash($contrasena,PASSWORD_DEFAULT);
                //para insertar en la bbdd
                if(isset($usuario)){
                    $sql= "INSERT INTO usuarios VALUES ('$usuario','$contrasena_cifrada')";

                    $_conexion->query($sql);

                    session_start();
                    $_SESSION["usuario"]=$usuario;
                    header("location: ../index.php");
                    exit;
                }
                
            }
            
        }
        
    }
    ?>
    <div class="container">
        <h1>FORMULARIO DE REGISTRO</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <h3>Si ya tienes cuenta, inicia sesion</h3>
            <a class ="btn btn-primary" href="iniciar_sesion.php">Iniciar sesion</a>
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input class="form-control" name="usuario" type="text">
                <?php if (isset($err_usuario)) echo "<span class='error' style='color:red'>$err_usuario</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input class="form-control" name="contrasena" type="password">
                <?php if (isset($err_contrasena)) echo "<span class='error' style='color:red'>$err_contrasena</span>"; ?>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="registro">
            </div>
            <div class="mb-3">
            <a class="btn btn-secondary" href="../index.php">Volver</a>
            </div>
            
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>