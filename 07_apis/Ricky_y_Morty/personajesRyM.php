<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Anime old</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    <?php
        $url = "https://rickandmortyapi.com/api/character";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);
        $datos = json_decode($respuesta, true);
        $personajes = $datos["results"]
    ?>
    <div class="container">
        <form method="get">
            <label>
            <input type="radio" name="genero" value="Male">
            Male
            </label>
            <label>
            <input type="radio" name="genero" value="Female">
            Female
            </label>
            <label>
            <input type="radio" name="genero" value="todos">
            Todos
            </label>
            <button type="submit">BUSCAR</button>
        </form>
    
        <br>
        <table class="table table-bordered border-primary">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Genero</th>
                    <th>Specie</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if(isset($_GET['genero'])){
                    if($_GET['genero']==="Male"){
                        foreach($personajes as $personaje) { 
                            if($personaje["gender"]==="Male"){
                                ?>
                                <tr>
                                    <td><?php echo $personaje["name"] ?></td>
                                    <td><?php echo $personaje["gender"] ?></td>
                                    <td><?php echo $personaje["species"] ?></td>
                                </tr>
                                <?php 
                            } 
                        }
                    }elseif($_GET['genero']==="Female"){
                        foreach($personajes as $personaje) { 
                            if($personaje["gender"]==="Female"){
                                ?>
                                <tr>
                                    <td><?php echo $personaje["name"] ?></td>
                                    <td><?php echo $personaje["gender"] ?></td>
                                    <td><?php echo $personaje["species"] ?></td>
                                </tr>
                                <?php 
                            } 
                        }
                    }elseif($_GET['genero']==="todos"){
                        foreach($personajes as $personaje) { 
                            ?>
                            <tr>
                                <td><?php echo $personaje["name"] ?></td>
                                <td><?php echo $personaje["gender"] ?></td>
                                <td><?php echo $personaje["species"] ?></td>
                            </tr>
                            <?php 
                            
                        }
                    }
                }else{
                    foreach($personajes as $personaje) { 
                        ?>
                        <tr>
                            <td><?php echo $personaje["name"] ?></td>
                            <td><?php echo $personaje["gender"] ?></td>
                            <td><?php echo $personaje["species"] ?></td>
                        </tr>
                        <?php 
                        
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    

    
</body>
</html>