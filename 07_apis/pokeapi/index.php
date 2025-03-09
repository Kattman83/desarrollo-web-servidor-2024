<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POKE API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    <?php
        
        if(isset($_GET["url"])){
            $url=$_GET["url"];
        }else{
            $url="https://pokeapi.co/api/v2/pokemon";
        }
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);
        $datos = json_decode($respuesta, true);
        $personajes = $datos["results"];
        
    ?>
    <h2>POKEMONS</h2>

    <div class="container">
        <table class="table table-bordered border-primary">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
            <?php
            
            foreach($personajes as $personaje){
                ?>
                <tr>
                    <td><a href="personaje.php?id=<?php echo $personaje["url"] ?>&volver=<?php echo $url ?>"><?php echo $personaje["name"] ?></a></td>
                    <td>
                        <?php 
                        $urlPersonaje=$personaje["url"]; 
                        $curl = curl_init();
                        curl_setopt($curl, CURLOPT_URL, $urlPersonaje);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                        $respuesta = curl_exec($curl);
                        curl_close($curl);
                        $pokemon = json_decode($respuesta, true);

                        if(($pokemon["sprites"]["front_shiny"])!=null){
                        ?>
                            <img width="100px" src="<?php
                            echo $pokemon["sprites"]["front_shiny"];
                        ?>"> <?php
                        }else{
                            echo "Este personaje no tiene imagen";
                        }
                        ?>
                     
                    </td>
                </tr>
                <?php
            }
               
            ?>
            </tbody>
        </table>
        </div>
        <?php
            if($datos["previous"]!==null){
                ?>
                <div class="btn btn-warning">
                    <a type="button" href="?url=<?php echo "https://pokeapi.co/api/v2/pokemon" ?>">Primera pagina</a>
                </div>
                <div class="btn btn-warning">
                    <a type="button" href="?url=<?php echo $datos["previous"] ?>">Anterior pagina</a>
                </div>
                <?php

            }
            if($datos["next"]!==null){
                ?>
                <div class="btn btn-warning">
                    <a type="button" href="?url=<?php echo $datos["next"] ?>">Siguiente pagina</a>
                </div>
                <div class="btn btn-warning">
                    <a type="button" href="?url=<?php echo "https://pokeapi.co/api/v2/pokemon?offset=1300&limit=4" ?>">Ultima pagina</a>
                </div>
                <?php

            }
            
        ?>
</body>
</html>