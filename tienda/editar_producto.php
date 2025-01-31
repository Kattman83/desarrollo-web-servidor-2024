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
            //guardamos las categorias registradas en un array
            $sql = "SELECT * FROM categorias ORDER BY categoria";
            $resultado = $_conexion -> query($sql);
            $categorias = [];

            while($fila = $resultado -> fetch_assoc()) {
                array_push($categorias, $fila["categoria"]);
            }


            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $id_producto = $_POST["id_producto"];
                //validacion nombre del producto
                if($_POST["nombre"]===""){
                    $err_nombre="<h2> Es obligatorio poner el nombre del producto</h2>";
                    //si el nombre es erroneo que se quede el nombre que tenia
                    $sql2="SELECT * FROM productos WHERE id_producto = $id_producto";
                    $resultado = $_conexion -> query($sql2);
                    while($fila=$resultado -> fetch_assoc()){
                        $nombre=$fila["nombre"];
                    }
                    
                }else if(strlen($_POST["nombre"])>50||strlen($_POST["nombre"])<2){
                    $err_nombre= "<h2> El nombre no puede tener más de 50 caracteres ni menos de 2 caracteres</h2>";
                    //si el nombre es erroneo que se quede el nombre que tenia
                    $sql2="SELECT * FROM productos WHERE id_producto = $id_producto";
                    $resultado = $_conexion -> query($sql2);
                    while($fila=$resultado -> fetch_assoc()){
                        $nombre=$fila["nombre"];
                    }
                }else{
                    $tmp_nombre=$_POST["nombre"];
                    $patron = '/^[a-zA-Z0-9 ]+$/';
                    if (!preg_match($patron, $tmp_nombre)) {
                        $err_nombre= "<h2> En el nombre solo se admiten letras, numeros y espacios</h2>";
                        //si el nombre es erroneo que se quede el nombre que tenia
                        $sql2="SELECT * FROM productos WHERE id_producto = $id_producto";
                        $resultado = $_conexion -> query($sql2);
                        while($fila=$resultado -> fetch_assoc()){
                            $nombre=$fila["nombre"];
                        }
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
                    //si el precio es erroneo que se quede el precio que tenia
                    $sql2="SELECT * FROM productos WHERE id_producto = $id_producto";
                    $resultado = $_conexion -> query($sql2);
                    while($fila=$resultado -> fetch_assoc()){
                        $precio=$fila["precio"];
                    }
                }else{
                    $precio=$tmp_precio;
                }

                //validacion categoria del producto
                if(!isset($_POST["categoria"])){
                    $err_categoria="<h2>Es obligatorio poner una categoría</h2>";
                    //si la categoria es erronea que se quede la que tenia
                    $sql2="SELECT * FROM productos WHERE id_producto = $id_producto";
                    $resultado = $_conexion -> query($sql2);
                    while($fila=$resultado -> fetch_assoc()){
                        $categoria=$fila["categoria"];
                    }
                }else{
                    $tmp_categoria=$_POST["categoria"];
                    $sql = "SELECT * FROM categorias ORDER BY categoria";
                    $resultado = $_conexion -> query($sql);
                    $categorias = [];
                    while($fila = $resultado -> fetch_assoc()) {
                        array_push($categorias, $fila["categoria"]);
                    }
                    if(!in_array($tmp_categoria,$categorias)){
                        $err_categoria="<h2>Debes añadir la categoria nueva o 
                        elegir una ya registrada</h2>";
                        //si la categoria es erronea que se quede la que tenia
                        $sql2="SELECT * FROM productos WHERE id_producto = $id_producto";
                        $resultado = $_conexion -> query($sql2);
                        while($fila=$resultado -> fetch_assoc()){
                            $categoria=$fila["categoria"];
                        }
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
                        //si el stock es erroneo que se quede el que tenia
                        $sql2="SELECT * FROM productos WHERE id_producto = $id_producto";
                        $resultado = $_conexion -> query($sql2);
                        while($fila=$resultado -> fetch_assoc()){
                            $stock=$fila["stock"];
                        }
                    }else{
                        $stock=$tmp_stock;
                    }
                }

                //validacion descripcion
                $tmp_descripcion=$_POST["descripcion"];
                if(strlen($tmp_descripcion)>255){
                    $err_descripcion="<h2>No puedes poner una descripcion de más de 255 caracteres</h2>";
                    //si la descripcion es erronea que se quede la que tenia
                    $sql2="SELECT * FROM productos WHERE id_producto = $id_producto";
                    $resultado = $_conexion -> query($sql2);
                    while($fila=$resultado -> fetch_assoc()){
                        $descripcion=$fila["descripcion"];
                    }
                }else{
                    $descripcion=$tmp_descripcion;
                    $sql = "UPDATE productos SET
                            nombre = '$nombre',
                            precio = $precio,
                            categoria = '$categoria',
                            stock = $stock,
                            descripcion ='$descripcion'
                        WHERE id_producto = $id_producto";

                    $_conexion -> query($sql);
                }

                
            }

            $sql = "SELECT * FROM categorias ORDER BY categoria";
            $resultado = $_conexion -> query($sql);
            $categorias = [];

            while($fila = $resultado -> fetch_assoc()) {
                array_push($categorias, $fila["categoria"]);
            }

            echo "<h1>" . $_GET["id_producto"] . "</h1>";

            $id_producto = $_GET["id_producto"];
            $sql = "SELECT * FROM productos WHERE id_producto = '$id_producto'";
            $resultado = $_conexion -> query($sql);
            $producto = $resultado -> fetch_assoc();
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input class="form-control" name="nombre" type="text" 
                    value="<?php echo $producto["nombre"] ?>">
                    <?php if (isset($err_nombre)) echo "<span class='error' style='color:red'>$err_nombre</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input class="form-control" name="precio" type="text"
                    value="<?php echo $producto["precio"] ?>">
                    <?php if (isset($err_precio)) echo "<span class='error' style='color:red'>$err_precio</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <select class="form-select" name="categoria">
                    <option value="<?php echo $producto["categoria"] ?>" selected>
                        <?php echo $producto["categoria"] ?>
                    </option>
                    <?php foreach($categorias as $categoria) { 
                        if($categoria!=$producto["categoria"]){?>
                        <option value="<?php echo $categoria ?>">
                            <?php echo $categoria ?>
                        </option>
                        <?php 
                        }
                    } ?>
                </select>
                <?php if (isset($err_categoria)) echo "<span class='error' style='color:red'>$err_categoria</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input class="form-control" name="stock" type="text"
                    value="<?php echo $producto["stock"] ?>">
                    <?php if (isset($err_stock)) echo "<span class='error' style='color:red'>$err_stock</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input class="form-control" name="descripcion" type="text"
                    value="<?php echo $producto["descripcion"] ?>">
                    <?php if (isset($err_descripcion)) echo "<span class='error' style='color:red'>$err_descripcion</span>"; ?>
            </div>
            <div class="mb-3">
                <input type="hidden" name="id_producto" value="<?php echo $producto["id_producto"] ?>">
                <input class="btn btn-primary" type="submit" value="Modificar">
                <a class="btn btn-secondary" href="index.php">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>