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
        
        require('util/conexion.php');
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
                //validacion nombre del producto
                if($_POST["nombre"]===""){
                    $err_nombre="<h2> Es obligatorio poner el nombre del producto</h2>";
                }else if(strlen($_POST["nombre"])>50||strlen($_POST["nombre"])<2){
                    $err_nombre= "<h2> El nombre no puede tener más de 50 caracteres ni menos de 2 caracteres</h2>";
                }else{
                    $tmp_nombre=$_POST["nombre"];
                    $patron = '/^[a-zA-Z0-9 ]+$/';
                    if (!preg_match($patron, $tmp_nombre)) {
                        $err_nombre= "<h2> En el nombre solo se admiten letras, numeros y espacios</h2>";
                    }else{
                        $nombre=$tmp_nombre;
                    }
                }
                //validacion precio del producto
                $tmp_precio=$_POST["precio"];
                if($tmp_precio===""){
                    $precio=10;
                }else if($tmp_precio>=1000000||$tmp_precio<0){
                    $err_precio="<h2> El precio no puede ser mayor de 999999.99,
                    ni tampoco menor que cero</h2>";
                }else{
                    $precio=$tmp_precio;
                }
                //validacion categoria del producto
                if(!isset($_POST["categoria"])){
                    $err_categoria="<h2>Es obligatorio poner una categoría</h2>";
                }else{
                    $tmp_categoria=$_POST["categoria"];
                    if(!in_array($tmp_categoria,$categorias)){
                        $err_categoria="<h2>Debes añadir la categoria nueva o 
                        elegir una ya registrada</h2>";
                    }else{
                        $categoria = $tmp_categoria;
                    }
                }
                //validacion stock del producto
                if($_POST["stock"]===""){
                    $stock=0;
                }else{
                    $tmp_stock=$_POST["stock"];
                    if($tmp_stock>=1000||$tmp_stock<0){
                        $err_stock="<h2>El stock no puede ser mayor que 999, 
                        ni tampoco menor que cero</h2>";
                    }else{
                        $stock=$tmp_stock;
                    }
                }
                //validacion descripcion
                $tmp_descripcion=$_POST["descripcion"];
                if(strlen($tmp_descripcion)>255){
                    $err_descripcion="<h2>No puedes poner una descripcion de más de 255 caracteres</h2>";
                }else{
                    $descripcion=$tmp_descripcion;
                }

                $direccion_temporal = $_FILES["imagen"]["tmp_name"];
                $nombre_imagen = $_FILES["imagen"]["name"];
                move_uploaded_file($direccion_temporal, "imagenes/$nombre_imagen");

                $sql = "INSERT INTO productos 
                    (nombre, precio, categoria, stock, imagen, descripcion)
                    VALUES
                    ('$nombre', $precio, '$categoria', $stock, './imagenes/$nombre_imagen', '$descripcion') 
                ";

                $_conexion -> query($sql);

            }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input class="form-control" name="nombre" type="text">
                <?php if (isset($err_nombre)) echo "<span class='error' style='color:red'>$err_nombre</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input class="form-control" name="precio" type="text">
                <?php if (isset($err_precio)) echo "<span class='error' style='color:red'>$err_precio</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Categoria</label>
                <select class="form-select" name="categoria">
                    <option value="" selected disabled hidden>--- Elige una Categoria ---</option>
                    <?php foreach($categorias as $categoria) { ?>
                        <option value="<?php echo $categoria ?>">
                            <?php echo $categoria ?>
                        </option>
                    <?php } ?>
                </select>
                <?php if (isset($err_categoria)) echo "<span class='error' style='color:red'>$err_categoria</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input class="form-control" name="stock" type="text">
                <?php if (isset($err_stock)) echo "<span class='error' style='color:red'>$err_stock</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input class="form-control" name="imagen" type="file">
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