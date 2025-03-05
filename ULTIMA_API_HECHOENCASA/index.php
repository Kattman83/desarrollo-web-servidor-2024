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
    #   JOAQUÍN CAMPOS IGLESIAS 2A DAW
    #mostrar PERSONAJES DRAGON BALL
    function mostrarPersonajes($num,$comienzo){
        
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
            
            for($i=$comienzo;$i<$num+$comienzo;$i++){
                ?>
                <tr>
                    <?php echo mostrarPersonaje($i); ?>
                </tr>
                <?php
            }
               
            ?>
            </tbody>
        </table>
            <?php
        
    } # termina mostrar personajes


    #mostra solo un personaje
    function mostrarPersonaje($id){
        
        $url = "https://dragonball-api.com/api/characters/$id";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);
        $personaje = json_decode($respuesta, true);
        if(!isset($personaje["id"])){
            ?>
            <td><a>ESTE PERSONAJE NO TIENE ID</a></td>
            <td></td>
            <td></td>
            <td></td>
            <?php
        }else{       
        ?>
            <td><a href="personaje.php?id=<?php echo $personaje["id"] ?>"><?php echo $personaje["name"] ?></a></td>
            <td><?php echo $personaje["race"] ?></td>
            <td><?php echo $personaje["gender"] ?></td>
            <td><img width="100px" src="<?php echo $personaje["image"] ?>"></td>
        <?php
        }
        
    }

    #encontrar el ultimo Item
    
    $url = "https://dragonball-api.com/api/characters";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);
    $datos = json_decode($respuesta, true);
    #ultimo Item
    $ultimoItem=intval($datos["meta"]["totalItems"]);
    
    
    
    if(isset($_GET["num"])&&isset($_GET["comienzo"])){

        $num=intval($_GET["num"]);
        $comienzo=intval($_GET["comienzo"]);
        if($comienzo<1){
            $comienzo=1;
        }

        if(($comienzo+$num)>$ultimoItem){
            mostrarPersonajes($ultimoItem-$num,$comienzo);
        }else{
            mostrarPersonajes($num,$comienzo);
        }
        
    }elseif(isset($_GET["num"])&&!isset($_GET["comienzo"])){
        $comienzo=1;
        $num=intval($_GET["num"]);
        mostrarPersonajes($num,$comienzo);
    }elseif(!isset($_GET["num"])&&isset($_GET["comienzo"])){
        $num=5;
        $comienzo=intval($_GET["comienzo"]);
        if($comienzo<1){
            $comienzo=1;
        }
        mostrarPersonajes($num,$comienzo);
    }else{
        $comienzo=1;
        $num=5;
        mostrarPersonajes($num,$comienzo);
    }


    
    if(isset($comienzo)&&$comienzo==1){
        ?>
        <div>
            <form>
                <a type="button" href="?num=<?php echo $num ?>&comienzo=<?php echo $comienzo+$num ?>">Siguiente pagina</a>
                <a type="button" href="?num=<?php echo 5 ?>&comienzo=<?php echo $ultimoItem-5 ?>">Final</a>
            </form>
        </div>
        <?php
    }elseif($comienzo+$num==$ultimoItem){
        ?>
        <div>
            <form>
                <a type="button" href="?num=<?php echo 5 ?>&comienzo=<?php echo 1 ?>">Inicio</a>
                <a type="button" href="?num=<?php echo $num ?>&comienzo=<?php echo $comienzo-$num ?>">Anterior pagina</a>
            </form>
        </div>
        <?php
    }else{
        ?>
        <div>
            <form>
                <?php 
                
                ?>
                <a type="button" href="?num=<?php echo 5 ?>&comienzo=<?php echo 1 ?>">Inicio</a>

                <a type="button" href="?num=<?php echo $num ?>&comienzo=<?php echo $comienzo-$num ?>">Anterior pagina</a>

                <a type="button" href="?num=<?php echo $num ?>&comienzo=<?php echo $comienzo+$num ?>">Siguiente pagina</a>

                <a type="button" href="?num=<?php echo 5 ?>&comienzo=<?php echo $ultimoItem-5 ?>">Final</a>
            </form>
        </div>
        <?php
    }
    ?>
      
        <form method="get">
            <div class="container">
                <input type="number" name="num" max="10" min="5">cuantos personajes quieres ver?(maximo 10)</input>
                <input type="number" name="comienzo" value="<?php echo $comienzo; ?>" hidden>
                <button type="submit">MOSTRAR</button>
            </div>
        </form>
         
    
    
</body>
</html>