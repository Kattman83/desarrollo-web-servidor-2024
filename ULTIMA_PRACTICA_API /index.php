<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRACTICA API DRAGON BALL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    <h1 class="container">DRAGON BALL</h1>
    <?php

    #mostrar PERSONAJES DRAGON BALL
    function mostrarPersonajes($pag,$numero){
        $url = "https://dragonball-api.com/api/characters?page=$pag";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $personajes = $datos["items"];
        $paginacion = $datos["meta"];
        $pagActual= $paginacion["currentPage"];
        ?>
        <div class="container">
        <table class="table table-bordered border-primary">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Raza</th>
                    <th>Genero</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
            <?php
            
            for($i=0;$i<$numero;$i++){
                ?>
                <tr>
                    <td><a href="personaje.php?id=<?php echo $personajes[$i]["id"] ?>">
                                        <?php echo $personajes[$i]["name"][0] ?>
                                    </a></td>
                    <td><?php echo $personajes[$i]["race"][0] ?></td>
                    <td><?php echo $personajes[$i]["gender"][0] ?></td>
                    <td><img width="100px" src="<?php echo $personajes[$i]["image"] ?>"></td>
                </tr>
                <?php
            }
               
            ?>
            </tbody>
            <?php
        
    echo "pagina $pagActual";
    } # termina mostra animes
    
    # averiguar ultimo
    function averiguarUltimo($pagina,$numero){
        $url = "https://dragonball-api.com/api/characters?page=$pag";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $personajes = $datos["items"];
        $paginacion = $datos["meta"];
        

    }
    
    $pag=1;
    
    if(!isset($num)){
        $num=5;
    }
    mostrarPersonajes($pag,$num);

    ?>
    
    <?php 
    
    if($pag==1){
        ?>
        <div>
            <form>
                <a href="index.php" >Siguiente pagina</a>
                <?php 
                setcookie("num", $num);
                setcookie("pag", $pag);
                ?>
            </form>
        </div>
        <?php
    }else{
        ?>
        <div>
            <form>
                <a href="index3.php?num=<?php echo urlencode($num); ?>&pag=<?php echo urlencode($pag); ?>" >Anterior pagina</a>
                <a href="index2.php?num=<?php echo urlencode($num); ?>&pag=<?php echo urlencode($pag); ?>"> Siguiente pagina</a>
                <?php 
                setcookie("num", $num);
                setcookie("pag", $pag);
                ?>
            </form>
        </div>
        <?php
    }
    ?>
    
</body>
</html>