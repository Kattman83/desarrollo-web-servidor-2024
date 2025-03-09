<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personaje TITANES</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
<?php
    if(!isset($_GET["id"])) {
        header("location: index.php"); 
    }
    $id=$_GET["id"];

    $url = "https://api.attackontitanapi.com/characters/$id";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $datos = json_decode($respuesta, true);
    $personaje = $datos;
    
    ?>
    <h1>Nombre: 
        <?php echo $personaje["name"] ?>
    </h1>
    <h1>Alias: 
        <?php 
        $alias=$personaje["alias"];
        foreach($alias as $alia){
            echo $alia;
        }
        
        ?>
    </h1>
    <h1>Género: 
        <?php echo $personaje["gender"] ?>
    </h1>
    <h1>Imagen:</h1>
    <?php 
        if(isset($personaje["img"])){
    ?>
            <img width="100px" src="<?php 
            $imagen = $personaje["img"];
            $imagen = substr($imagen, 0, strpos($imagen, ".png") + 4);
            echo $imagen; ?>"> 
    <?php
        }else{
            echo "Este personaje no tiene imagen";
        }
    ?>

    <h1>Lugar de nacimiento: 
        <?php echo $personaje["birthplace"] ?>
    </h1>

<a class="btn btn-secondary" type="submit" name="nextP" href="index.php" >Volver</a>
   
</body>
</html>