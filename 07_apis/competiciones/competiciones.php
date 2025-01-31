<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Competiciones</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
<?php
    if(!isset($_GET["id"])) {
        header("location: top_competiciones.php"); 
    }
    $id = $_GET["id"];
    $url = "http://api.football-data.org/v4/competitions";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $datos = json_decode($respuesta, true);
    $competicion = $datos["competitions"];
    ?>
    <h1>
        <?php echo $competicion["name"] ?>
    </h1>

    <?php if(isset($competicion["area"]["flag"])){
        ?> 
            <img width="200px" src="<?php echo $competicion["area"]["flag"] ?>">
        <?php
    }
    ?>
    <h2>Tipo de competicion/eliminatoria</h2>
    <p>
        <?php echo $competicion["type"] ?>
    </p>

    <h2>Región</h2>
    <iframe src="<?php echo $competicion["area"]["name"] ?>"></iframe>
</body>
</html>