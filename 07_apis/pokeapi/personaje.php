<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personaje Pokemon</title>
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
    $url=$_GET["id"];
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $datos = json_decode($respuesta, true);
    $pokemon = $datos;
    
    ?>
    <h1>Nombre: 
        <?php echo $pokemon["name"] ?>
    </h1>
    <h1>Altura: 
        <?php echo $pokemon["height"] ?>
    </h1>
    <h1>Peso: 
        <?php echo $pokemon["weight"] ?>
    </h1>
    <h1>Imagen:</h1>
    <?php 
        if(($pokemon["sprites"]["front_shiny"])!=null){
        ?>
            <img width="100px" src="<?php
            echo $pokemon["sprites"]["front_shiny"];
        ?>"> <?php
        }else{
            echo "Este personaje no tiene imagen";
        }
    ?>

    <h1>ID: 
        <?php echo $pokemon["id"] ?>
    </h1>
    <?php
        
    ?>

<a class="btn btn-secondary" type="submit" href="index.php?url=<?php echo $_GET["volver"] ?>" >Volver</a>
   
</body>
</html>