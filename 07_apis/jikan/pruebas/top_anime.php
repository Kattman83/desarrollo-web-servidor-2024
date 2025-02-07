<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Anime</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
            
    <?php
        session_start();

        
        
        $url = "https://api.jikan.moe/v4/top/anime";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $animes = $datos["data"];
        $paginacion = $datos["pagination"];
        $nextPage=$paginacion["current_page"]+1;

        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $_SESSION["nextpagina"]=$_POST[""];
        }
            

    ?>
    
    <form method="post">
        <input class="btn btn-primary" type="submit" name="siguientepag" value="<?php $nextPage ?>" >Siguiente pagina</input>
        <?php
            if(!isset($_GET["siguientepag"])){
                $url = "https://api.jikan.moe/v4/top/anime";

                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $respuesta = curl_exec($curl);
                curl_close($curl);

                $datos = json_decode($respuesta, true);
                $animes = $datos["data"];
                $paginacion = $datos["pagination"];
                $nextPage=$paginacion["current_page"]+1;


                echo "no lo piya";
            }else{
                $pagina=$nextPage;
                echo "lo piya";
                echo $pagina;
                $url = "https://api.jikan.moe/v4/top/anime?page=$pagina";

                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $respuesta = curl_exec($curl);
                curl_close($curl);

                $datos = json_decode($respuesta, true);
                $animes = $datos["data"];
                $paginacion = $datos["pagination"];
            }
        ?>
    </form>
    <?php echo "<h1>", $paginacion["current_page"] , "</h1>" ?><br>
    <?php
    
    
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
                    }elseif($_GET['tipo']==="series"){
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