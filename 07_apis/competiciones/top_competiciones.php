<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMPETICIONES FUTBOL</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
        $url = "http://api.football-data.org/v4/competitions";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $competiciones = $datos["competitions"];
    ?>
    
    <div class="container">
    <h1>COMPETICIONES FUTBOL</h1>
        <table class="table table-bordered border-primary">
            <thead>
                <tr>
                    <th>Competicion</th>
                    <th>País/Continente</th>
                    <th>Tipo</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($competiciones as $competicion) { ?>
                    <tr>
                        <td>
                            
                            <a href="competiciones.php?id=<?php echo $competicion["id"] ?>">
                                <?php echo $competicion["name"] ?>
                            </a>
                        </td>
                        <td>
                            <?php echo $competicion["area"]["name"] ?>
                        </td>
                        <td><?php echo $competicion["type"] ?></td>
                        
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>