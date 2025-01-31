<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        //para conectar con la base de datos
        require('util/conexion.php');

        //averiguamos si está abierta la sesion
        session_start();
        if(!isset($_SESSION["usuario"])){
            $iniciado=false;//usaremos el booleano para indicar si la sesion esta iniciada o no
        }
        else{
            $iniciado=true;
        }
    ?>
    <style>
        .table-primary {
            --bs-table-bg: #b0008e;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>TIENDA</h2>
        
        <?php
        //si la sesion esta iniciada se mostrará lo siguiente
            if($iniciado){?>
                <h2>Bienvenid@ <?php echo $_SESSION["usuario"]?></h2>
                <a class="btn btn-danger" href="usuario/cerrar_sesion.php">Cerrar Sesión</a>
                <?php
            }else{?>
                <a class="btn btn-danger" href="usuario/iniciar_sesion.php">Iniciar Sesión</a>
                <a class="btn btn-danger" href="usuario/registro.php">Registrarse</a>
                <?php
            }//si la sesion no esta iniciada se mostrarán los botones de Iniciar Sesión y Registrarse
        ?>
        
        
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $id_producto = $_POST["id_producto"];
                //codigo para borrar un producto, se activara al darle al boton borrar
                $sql = "DELETE FROM productos WHERE id_producto = '$id_producto'";
                $_conexion -> query($sql);
            }

            $sql = "SELECT * FROM productos";
            $resultado = $_conexion -> query($sql);

            if($iniciado){?>
                <a class="btn btn-secondary" href="nuevo_producto.php">Nuevo producto</a><br><br>
                <a class="btn btn-secondary" href="categorias/index.php">Categorias</a><br><br>
                <a class="btn btn-secondary" href="usuario/cambiar_credenciales.php">Configuracion de cuenta</a><br><br>
            <?php
            }//si la sesion está iniciada se muestran los botones para añadir productos y gestionar las categorias
            //ademas del boton para ir a la configuracion de la cuenta(cambar contraseña...)
        ?>
        <h1>Listado de Productos</h1>
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                    <th>Stock</th>
                    <th>Imagen</th>
                    <th>Descripción<th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                //creamos la tabla con los productos que se encuentran registrados
                    while($fila = $resultado -> fetch_assoc()) {
                        
                        echo "<tr>";
                        echo "<td>" . $fila["nombre"] . "</td>";
                        echo "<td>" . $fila["precio"] . "</td>";
                        echo "<td>" . $fila["categoria"] . "</td>";
                        echo "<td>" . $fila["stock"] . "</td>";
                    ?>
                    <td>
                        <img width="50" heigth="80" src="<?php echo $fila["imagen"] ?>">
                    </td>
                    <?php
                    echo "<td>" . $fila["descripcion"] . "</td>";
                    ?>
                    <?php
                    //si la sesion está iniciada se mostrarán los botones para editar y borrar productos
                    if($iniciado){?>
                        <td>
                            <a class="btn btn-primary" 
                            href="editar_producto.php?id_producto=<?php echo $fila["id_producto"] ?>">Editar</a>
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id_producto" value="<?php echo $fila["id_producto"] ?>">
                                <input class="btn btn-danger" type="submit" value="Borrar">
                            </form>
                        </td>
                    <?php
                    }
                    ?>
                    <?php
                    echo "</tr>";
                        
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>