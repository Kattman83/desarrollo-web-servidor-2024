<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TITANES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    <?php 
        $url = "https://api.attackontitanapi.com/characters";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);
        $datos = json_decode($respuesta, true);
        $personajes = $datos["results"]; 
    ?>
    <div class="container">
        <table class="table table-bordered border-primary">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Género</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
            <?php
            
            foreach($personajes as $personaje){
                ?>
                <tr>
                    <td><?php echo $personaje["name"] ?></td>
                    <td><?php echo $personaje["age"] ?></td>
                    <td><?php echo $personaje["gender"] ?></td>
                    <td><img width="100px" src="<?php 
                    if(isset($personaje["img"])){
                        echo $personaje["img"];
                    }else{
                        echo "Este personaje no tiene imagen";
                    }
                     ?>"></td>
                </tr>
                <?php
            }
               
            ?>
            </tbody>
        </table>
            



</body>
</html>