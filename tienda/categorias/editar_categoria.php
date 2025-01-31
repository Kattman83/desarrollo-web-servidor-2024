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
            
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $category = $_GET["categoria"];

                //validacion descripcion
                $tmp_descripcion=$_POST["descripcion"];
                if($tmp_descripcion===""){
                    $descripcion=$tmp_descripcion;
                }else if(strlen($tmp_descripcion)>255){
                    $err_descripcion="<h2>La descripcion no puede tener más de 255 caracteres</h2>";
                }else{
                    $descripcion=$tmp_descripcion;
                }

                $sql = "UPDATE categorias SET
                            descripcion ='$descripcion'
                        WHERE categoria = '$category'";

                $_conexion -> query($sql);
            }
            $categoria=$_GET["categoria"];
            $sql = "SELECT * FROM categorias WHERE categoria = '$categoria'";
            $resultado = $_conexion -> query($sql);
            $category = $resultado -> fetch_assoc();

        ?>
        <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
                <label class="form-label">Categoría</label>
                <input class="form-control" name="categoria" type="text"
                    value="<?php echo $category["categoria"] ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input class="form-control" name="descripcion" type="text"
                    value="<?php echo $category["descripcion"] ?>" >
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Modificar">
                <a class="btn btn-secondary" href="index.php">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>