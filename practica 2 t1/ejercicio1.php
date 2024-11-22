<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación Pokémons</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
    <style>
        .error{
            color: red;
        }
        body{
            padding-left: 100px;
            padding-right: 300px;
        }
    </style>
</head>
<body>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //validación nombre
        if($_POST["nombre"]==""){
            $err_nombre= "Poner el nombre es obligatorio";
        }else{
            $patronNom='/^[a-zA-Záéíóúñ]{3,30}$/';
            $tmp_nombre=$_POST["nombre"];
            if(!preg_match($patronNom,$tmp_nombre)){
                $err_nombre="El nombre solo puede tener letras, puede tener tildes un minimo de 3 caracteres y un máximo de 30 caracteres.";
            }else{
                $nombre=$tmp_nombre;
            }
        }
        //validación peso
        if($_POST["peso"]==null){
            $err_peso="El peso es obligatorio";
        }else{
            $tmp_peso=$_POST["peso"];
            if($tmp_peso<0.1||$tmp_peso>999.9){
                $err_peso="el peso no puede ser menor de 0,1 ni mayor de 999'9";
            }else{
                $peso=$tmp_peso;
            }
        }
        //validacion genero
        $tmp_genero=$_POST["genero"];
        if(($tmp_genero!="hembra")&&($tmp_genero!="macho")&&($tmp_genero!="")){
            $err_genero="Ese no es un genero válido";
        }else{
            $genero=$tmp_genero;
        }
        //validacion tipo
        if($_POST["tipo"]==""){
            $err_tipo="El tipo es obligatorio";
        }else{
            $tmp_tipo=$_POST["tipo"];
            $arrayTipos=["Agua","Fuego","Volador","Planta","Electrico"];
            if(!in_array($tmp_tipo,$arrayTipos)){
                $err_tipo="Ese no es un tipo válido";
            }else{
                $tipo=$tmp_tipo;
            }
        }  
        //validación fecha captura
        if($_POST["fecha_cap"]==""){
            $err_fecha_cap="La fecha es obligatoria";
        }else{
            $tmp_fechaCap=$_POST["fecha_cap"];
                list($yearcap, $mescap, $diacap) = explode('-', $tmp_fechaCap);
            $fecha_actual = date("Y-m-d");
                list($year_actual, $mes_actual, $dia_actual) = explode('-', $fecha_actual);
            if($yearcap<($year_actual-30)||$yearcap>$year_actual){
                $err_fecha_cap="Error el año no puede ser hace mas de 30 años ni tampoco mas del año actual";
            }else{
                if($yearcap==($year_actual-30)&&$mescap==$mes_actual&&$diacap<$dia_actual){
                    $err_fecha_cap="Error , de esa fecha hace mas de 30 años";
                }elseif($yearcap==($year_actual-30)&&$mescap<$mes_actual){
                    $err_fecha_cap="Error , de esa fecha hace mas de 30 años";
                }elseif($yearcap==$year_actual&&$mescap==$mes_actual&&$diacap>$dia_actual){
                    $err_fecha_cap="Error, no se puede poner una fecha furtura";
                }elseif($yearcap==$year_actual&&$mescap>$mes_actual){
                    $err_fecha_cap="Error, no se puede poner una fecha furtura";
                }
                else{
                    $fecha_captura=$tmp_fechaCap;
                }
            }
        }
        
    }
    ?>
    <h3>Formulario Pokémons</h3>
    <form action="" method="post">
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input class="form-control" type="text" name="nombre">
            <?php if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>" ?>
        </div>
        <br><br>
        <div class="mb-3">
            <label class="form-label">Peso</label>
            <input class="form-label" type="number" name="peso">
        <?php if (isset($err_peso)) echo "<span class='error'>$err_peso</span>" ?>
        <br><br>
        <div class="mb-3">
            <h5>Género:</h5>
            <label>
                <p>Hembra</p>
                <input type="radio" name="genero" value="hembra">
            </label>
            <br><br>
            <label>
                <p>Macho</p>
                <input type="radio" name="genero" value="macho">
            </label>
        <?php if (isset($err_genero)) echo "<span class='error'>$err_genero</span>" ?>
        </div>
        <br><br>
        <div class="mb-3">
            <label for="tipo">Tipo:</label>
            <select name="tipo" id="tipo">
                <option value="">Elige un tipo</option>
                <option value="Agua">Agua</option>
                <option value="Fuego">Fuego</option>
                <option value="Volador">Volador</option>
                <option value="Planta">Planta</option>
                <option value="Electrico">Electrico</option>
            </select>
            <?php if (isset($err_tipo)) echo "<span class='error'>$err_tipo</span>" ?>
        </div>
        <br><br>
        <div class="mb-3">
        <label class="form-label">Fecha de captura</label>
        <input class="form-control" name="fecha_cap" type="date">
        <?php if (isset($err_fecha_cap)) echo "<span class='error'>$err_fecha_cap</span>" ?>
        </div>
        <div>
        <h3>Descripción(opcional):</h3>
        <textarea name="descripcion" rows="6px" cols="100" placeholder="No hay descripción"></textarea>
        <?php if (isset($err_descripcion)) echo "<span class='error' style='color:red'>$err_descripcion</span>"; ?>
        </div>
        <br><br>
        <input type="submit" value="Enviar">

        
    </form>
    
</body>
</html>