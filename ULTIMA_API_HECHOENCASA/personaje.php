<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personaje DB</title>
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

    $url = "https://dragonball-api.com/api/characters/$id";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $datos = json_decode($respuesta, true);
    $personaje = $datos;
    
    ?>
    <h1>Nombre: 
        <?php echo $personaje["name"][0] ?>
    </h1>
    <h1>Raza: 
        <?php echo $personaje["race"][0] ?>
    </h1>
    <h1>Género: 
        <?php echo $personaje["gender"][0] ?>
    </h1>
    <h1>Imagen:</h1>
    <img width="200px" src="<?php echo $personaje["image"]?>">

    <h1>Descripción: 
        <?php echo $personaje["description"] ?>
    </h1>

    <h1>Transformaciones</h1>
    <?php 
    $numTrans=count($personaje["transformations"]);
    if($numTrans==0){
        echo "<h3>No tiene transformaciones</h3>";
    }else{
        ?>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
        <?php
        for($i=0;$i<$numTrans;$i++){
            ?>
                <tr>
                    <td><?php echo $personaje["transformations"][$i]["name"] ?></td>
                    <td><img width="100px" src="<?php echo $personaje["transformations"]["$i"]["image"] ?>"></td>
                </tr>
                <?php
            
        } ?> 
            <tbody>
        </table>
        <?php
    }

    ?>

<a class="btn btn-secondary" type="submit" name="nextP" href="index.php" >Volver</a>
   
</body>
</html>