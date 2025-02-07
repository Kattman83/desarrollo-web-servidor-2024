<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Anime next</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        #require("top_anime_prueba");
    ?>
</head>
<body>
    <h1 class="container">ANIMES</h1>
    <?php 

    #mostrar anime
    function mostrarAnimes($pag,$tipo){
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
            if(isset($tipo)){
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
                    $pag=$paginacion["current_page"];
                        $Npag=$pag+1; 
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
                    $pag=$paginacion["current_page"];
                        $Npag=$pag+1;
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
                    $pag=$paginacion["current_page"];
                        $Npag=$pag+1;
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
                $pag=$paginacion["current_page"];
                $Npag=$pag+1;
                
            }
            
             ?>
            </tbody>
        </table>
            </div>
    <?php
    echo "pagina $pag";
    } # termina mostra animes
    
    #funcion averiguar pagina final
    function saberPaginaFinal($pagina){
        $url = "https://api.jikan.moe/v4/top/anime?page=$pagina";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);
        $datos = json_decode($respuesta, true);
        $paginacion = $datos["pagination"];
        return $paginacion["last_visible_page"];
    }

    #funcion averiguar pagina actual
    function saberPaginaActual($pagina){
        $url = "https://api.jikan.moe/v4/top/anime?page=$pagina";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);
        $datos = json_decode($respuesta, true);
        $paginacion = $datos["pagination"];
        return $paginacion["current_page"];
    }
    
    if(!isset($_GET["nextP"])) {
        $pag=$_COOKIE["nextP"]; 
    }else{
        $pag=$_GET["nextP"]+1;
    }
    
    if(!isset($_GET["nextTip"])) {
        $type=$_COOKIE["nextTip"]; 
    }else{
        $type=$_GET["nextTip"];
    }
    
    setcookie("nextTip",$type);
    setcookie("nextP",$pag);
    ?>
    <div class="container">
        <form method="get">
            <label>
            <input type="radio" name="nextTip" value="peliculas">
            Películas
            </label>
            <label>
            <input type="radio" name="nextTip" value="series">
            Series
            </label>
            <label>
            <input type="radio" name="nextTip" value="todos">
            Todos
            </label>
            <input type="radio" name="nextP" value="<?php
            echo saberPaginaActual($pag);
            ?>" hidden> 
            <button type="submit">MOSTRAR</button>
            <?php
                
            ?>
        </form>
    </div><br><br>
    <?php

        mostrarAnimes($pag,$type);

        if($pag==saberPaginaFinal($pag)){
            ?>
            <div class="container">
                <form>
                    <a class="btn btn-secondary" type="submit" name="nextP" href="befPage_anime2.php?befP=<?php echo urlencode($pag); ?>&befTip=<?php echo urlencode($type); ?>" >Anterior pagina</a>
                </form>
            </div>
            <?php
        }else{
            ?>
            <div class="container">
                <form>
                    <a class="btn btn-secondary" type="submit" name="befP" href="befPage_anime2.php?befP=<?php echo urlencode($pag); ?>&befTip=<?php echo urlencode($type); ?>" >Anterior pagina</a>
                    <a class="btn btn-secondary" type="submit" name="nextP" href="nextPage_anime2.php?nextP=<?php echo urlencode($pag); ?>&nextTip=<?php echo urlencode($type); ?>" >Siguiente pagina</a>
                </form>
            </div>
            <?php
        }
        
        
    ?>
</body>
</html>