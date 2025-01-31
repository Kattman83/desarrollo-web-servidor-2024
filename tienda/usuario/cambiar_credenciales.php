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
    <div class="container">
        <?php

            session_start();
            $usuario=$_SESSION["usuario"];
            $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
            $resultado = $_conexion -> query($sql);
            $info_user = $resultado -> fetch_assoc();
            
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                
                $new_password = $_POST["contrasena"];
                $new_password2= $_POST["contrasena2"];

                if($new_password!=$new_password2){
                    $err_nueva_contrasena='La confirmación es erronea, intentalo de nuevo';
                }else{
                    $tmp_contrasena=$new_password;
                    if($tmp_contrasena===""){
                        $err_nueva_contrasena="<h2>La contrasena es obligatoria</h2>";
                    }else if(strlen($tmp_contrasena)>15||strlen($tmp_contrasena)<8){
                        $err_nueva_contrasena="<h2>La contraseña no puede tener más de 15 caracteres ni tampoco menos de 8 caracteres</h2>";
                    }else{
                        $patron="/^(?=.*[a-z])(?=.*[A-Z])[0-9\w\W]+$/";
                        if(!preg_match($patron, $tmp_contrasena)){
                            $err_nueva_contrasena="<p>La contraseña solo admite obligatoriamente minimo una letra mayúscula y una letra minuscula, además tambien puede llevar caracteres especiales y numeros</p>";
                        }else{
                            $contrasena_cifrada= password_hash($tmp_contrasena,PASSWORD_DEFAULT);
                            
                            $usuario=$_SESSION["usuario"];
                            $sql = "UPDATE usuarios SET
                                contrasena ='$contrasena_cifrada'
                            WHERE usuario = '$usuario'";

                        $_conexion -> query($sql);
                        } 
                    }   
                }
                
            }
            
        ?>
        <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input class="form-control" name="nombre" type="text"
                    value="<?php echo $_SESSION["usuario"] ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Nueva Contraseña</label>
                <input class="form-control" name="contrasena" type="text">
            </div>
            <div class="mb-3">
                <label class="form-label">CONFIRMAR Nueva Contraseña</label>
                <input class="form-control" name="contrasena2" type="text">
            </div>
            <?php if (isset($err_nueva_contrasena)) echo "<span class='error' style='color:red'>$err_nueva_contrasena</span>"; ?>
            <br><br>
                <a class="btn btn-danger" href="eliminar_usuario.php">ELIMINAR ESTA CUENTA</a>
            <br><br>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Modificar">
                <a class="btn btn-secondary" href="../index.php">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>