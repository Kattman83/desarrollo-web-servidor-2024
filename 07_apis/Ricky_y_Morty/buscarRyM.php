<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RyM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    <?php

        $gen=$_GET["generoP"];
        $genero=htmlspecialchars($gen);
        echo $genero;

        $esp=$_GET["especieP"];
        $especie=htmlspecialchars($esp);
        echo $especie;

        function buscarPersonaje($genero,$especie){
            $url = "https://rickandmortyapi.com/api/character";
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $respuesta = curl_exec($curl);
            curl_close($curl);
            $datos = json_decode($respuesta, true);
            $personajes = $datos["results"];

            if(isset($genero)&&isset($especie)){
                ?>
                <div class="container">
                    <table class="table table-bordered border-primary">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Genero</th>
                                <th>Especie</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($personajes as $personaje){
                            if($personaje["gender"]=$genero&&$personaje["species"]=$especie){?>
                                <tr>
                                    <td><?php echo $personaje["id"] ?></td>
                                    <td><?php echo $personaje["name"] ?></td>
                                    <td><?php echo $personaje["gender"] ?></td>
                                    <td><?php echo $personaje["species"] ?></td>
                                </tr>
                                <?php
                                
                            }
                        }?>
                        </tbody>
                    </table>
                </div>
                <?php
            }

        }#termina funcion buscar personaje
        
        
    ?>
    <div class="container">
        <form>
        <label>Cantidad de personajes que quieres ver2:</label>
            <input type="number" name="numeroPers" max="840"></input><br>

            <h1>Gender</h1>
            <label>
            <input type="radio" name="gender" value="Male">
            Male
            </label>
            <label>
            <input type="radio" name="gender" value="Female">
            Female
            </label>
            <label>
            <input type="radio" name="gender" value="todos">
            Todos
            </label><br>

            <h1>Especie</h1>
            <label>
            <input type="radio" name="especie" value="Human">
            Human
            </label>
            <label>
            <input type="radio" name="especie" value="Alien">
            Alien
            </label>
            <br>
            <?php
            if(isset($_GET["gender"])){
                $gender=$_GET["gender"];
            }else{
                $gender="";
            }
            if(isset($_GET["especies"])){
                $specie=$_GET["especie"];
            }else{
                $specie="";
            }
            
            ?>
            <div class="container">
                <form>
                    <a class="btn btn-secondary" type="submit" name="nextP" href="buscarRyM.php?generoP=<?php echo urlencode($gender); ?>&especieP=<?php echo urlencode($specie) ?>" >BUSCAR</a>
                </form>
            </div>
        <?php 
            buscarPersonaje($genero,$especie);
        ?>
        </h1>
        
            


        </form>
    </div>
    
</body>
</html>