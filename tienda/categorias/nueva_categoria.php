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
            $sql = "SELECT * FROM categorias ORDER BY categoria";
            $resultado = $_conexion -> query($sql);
            $categorias = [];

            while($fila = $resultado -> fetch_assoc()) {
                array_push($categorias, $fila["categoria"]);
            }

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                //validacion nombre de la categoria
                $tmp_categoria=$_POST["categoria"];
                if($tmp_categoria===""){
                    $err_categoria="<h2>Es obligatorio poner el nombre de la categoria</h2>";
                }
                else if(strlen($tmp_categoria)>30||strlen($tmp_categoria)<2){
                    $err_categoria="<h2>El nombre de la categoria no puede tener más de 30 caracteres ni menos de 2</h2>";
                }else{
                    $patron="/^[a-zA-Z ]+$/";
                    if(!preg_match($patron, $tmp_categoria)){
                        $err_categoria="<h2>El nombre de la categoria solo admite letras y espacios</h2>";
                    }else{
                        $categoria=$tmp_categoria;
                    }
                }
                //validacion descripcion(opcional)
                $tmp_descripcion=$_POST["descripcion"];
                if($tmp_descripcion===""){
                    $descripcion=$tmp_descripcion;
                }else if(strlen($tmp_descripcion)>255){
                    $err_descripcion="<h2>La descripcion no puede tener más de 255 caracteres</h2>";
                }else{
                    $descripcion=$tmp_descripcion;
                }


                $sql = "INSERT INTO categorias 
                    (categoria, descripcion)
                    VALUES
                    ('$categoria', '$descripcion')
                ";

                $_conexion -> query($sql);

            }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Categoria</label>
                <input class="form-control" name="categoria" type="text">
                <?php if (isset($err_categoria)) echo "<span class='error' style='color:red'>$err_categoria</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input class="form-control" name="descripcion" type="text">
                <?php if (isset($err_descripcion)) echo "<span class='error' style='color:red'>$err_descripcion</span>"; ?>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Crear">
                <a class="btn btn-secondary" href="index.php">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>