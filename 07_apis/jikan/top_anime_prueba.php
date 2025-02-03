<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Anime prueba</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    <h1 class="container">ANIMES</h1>
    <?php 
    #mostrar anime por pagina
    function mostrarAnimes($pag){
        $url = "https://api.jikan.moe/v4/top/anime?page=$pag";

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
    <?php } ?>
            </tbody>
        </table>
            </div>
    <?php
    } # termina mostra animes por pagina


    #funcion mostrar animes por tipo
    function mostrarAnimesporTipo($tipo){
        $url = "https://api.jikan.moe/v4/top/anime";

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
                if($tipo==="peliculas"){
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
                }elseif($tipo==="series"){
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
                 ?>
            </tbody>
        </table>
    </div>
        
        <?php
    }#fin de la funcion mostrar por tipo
    
    
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
    </div><br><br>
    <?php 
        if(isset($_GET["tipo"])){
            $type=$_GET["tipo"];
            mostrarAnimesporTipo($type);

        }else{
            $pag=1;
            mostrarAnimes($pag);
        }
        if($pag==1){
            ?>
            <div class="container">
                <form>
                    <a class="btn btn-secondary" type="submit" name="nextP" href="nextPage_anime.php?nextP=<?php echo urlencode($pag); ?>" >Siguiente pagina</a>
                </form>
            </div>
            <?php
        }else{
            ?>
            <div class="container">
                <form>
                    <a class="btn btn-secondary" type="submit" name="befP" href="befPage_anime.php?befP=<?php echo urlencode($pag); ?>" >Anterior pagina</a>
                    <a class="btn btn-secondary" type="submit" name="nextP" href="nextPage_anime.php?nextP=<?php echo urlencode($pag); ?>" >Siguiente pagina</a>
                </form>
            </div>
            <?php
        }
    
    ?>
    
</body>
</html>