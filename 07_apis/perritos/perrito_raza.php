<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERRITO POR RAZA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
<?php 
if(!isset($_GET["raza"])){
    $url = "https://dog.ceo/api/breeds/list/all";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);
    $datos = json_decode($respuesta, true);   
    $razas=array_keys($datos["message"]);
}else{
    $raza=$_GET["raza"];
    $url = "https://dog.ceo/api/breed/$raza/images";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);
    $datos = json_decode($respuesta, true);
    $imagenes=$datos["message"];   
    $numImagenes=count($imagenes);
    $numAleatorio=rand(0,$numImagenes);
    ?>
    <img src="<?php echo $imagenes[$numAleatorio] ?>">
    <a class="btn btn-secondary" href="perrito_raza.php" >Anterior pagina</a>
    <?php
}
    

    if(!isset($_GET["raza"])){
        
        ?>
        <h3>ELIGE UNA RAZA DE PERRO</h3>
        <div class="container">
            <form method="get">
            <button type="submit" >MOSTRAR</button>
                <table class="table table-bordered border-primary">
                    <thead>
                        <tr>
                            <th>RAZA</th>
                            <th>selección</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($razas as $raza){
                                echo "<tr>";
                                echo "<td>";
                                echo $raza;
                                echo "</td>";
                                echo "<td><input type='radio' name='raza' value='$raza'</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
                
            </form>

        </div>
        <?php 
    }
    
    
    
    ?>
    
</body>
</html>