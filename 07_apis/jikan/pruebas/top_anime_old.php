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
        $pagina=1;

        $url = "https://api.jikan.moe/v4/top/anime?page=$pagina";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $animes = $datos["data"];
        $paginacion = $datos["pagination"];
    ?>
    <div class="container">
        <form method="get">
            <label>
            <input type="radio" name="tipo" value="peliculas">
            Películas
            </label>
            <label>
            <input type="radio" name="tipo" value="series">
            Series
            </label>
            <label>
            <input type="radio" name="tipo" value="todos">
            Todos
            </label>
            <button type="submit">MOSTRAR</button>
        </form>
    
        <br>
        <table class="table table-bordered border-primary">
            <thead>
                <tr>
                    <th>Posición</th>
                    <th>Título</th>
                    <th>Nota</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
                if(isset($_GET['tipo'])){
                    if($_GET['tipo']==="peliculas"){
                        foreach($animes as $anime) { 
                            if($anime["type"]==="Movie"){
                                ?>
                                <tr>
                                    <td><?php echo $anime["rank"] ?></td>
                                    <td>
                                        <a href="anime.php?id=<?php echo $anime["mal_id"] ?>">
                                            <?php echo $anime["title"] ?>
                                        </a>
                                    </td>
                                    <td><?php echo $anime["score"] ?></td>
                                    <td>
                                        <img width="100px" src="<?php echo $anime["images"]["jpg"]["image_url"] ?>">
                                    </td>
                                </tr>
                                <?php 
                            } 
                        }
                    }elseif($_GET['tipo']==="TV"||$_GET['tipo']==="TV Special"){
                        foreach($animes as $anime) { 
                            if($anime["type"]==="TV"||$anime["type"]==="TV Special"){
                                ?>
                                <tr>
                                    <td><?php echo $anime["rank"] ?></td>
                                    <td>
                                        <a href="anime.php?id=<?php echo $anime["mal_id"] ?>">
                                            <?php echo $anime["title"] ?>
                                        </a>
                                    </td>
                                    <td><?php echo $anime["score"] ?></td>
                                    <td>
                                        <img width="100px" src="<?php echo $anime["images"]["jpg"]["image_url"] ?>">
                                    </td>
                                </tr>
                                <?php 
                            } 
                        }
                    }else{
                        foreach($animes as $anime) { 
                            if($anime["type"]==="TV"||$anime["type"]==="TV Special"){
                                ?>
                                <tr>
                                    <td><?php echo $anime["rank"] ?></td>
                                    <td>
                                        <a href="anime.php?id=<?php echo $anime["mal_id"] ?>">
                                            <?php echo $anime["title"] ?>
                                        </a>
                                    </td>
                                    <td><?php echo $anime["score"] ?></td>
                                    <td>
                                        <img width="100px" src="<?php echo $anime["images"]["jpg"]["image_url"] ?>">
                                    </td>
                                </tr>
                                <?php 
                            } 
                        }
                    } 
                }else{
                    foreach($animes as $anime) { ?>
                        <tr>
                            <td><?php echo $anime["rank"] ?></td>
                            <td>
                                <a href="anime.php?id=<?php echo $anime["mal_id"] ?>">
                                    <?php echo $anime["title"] ?>
                                </a>
                            </td>
                            <td><?php echo $anime["score"] ?></td>
                            <td>
                                <img width="100px" src="<?php echo $anime["images"]["jpg"]["image_url"] ?>">
                            </td>
                        </tr>
            <?php   } 
                }
                ?>
            </tbody>
        </table>
    </div>
    

    
</body>
</html>