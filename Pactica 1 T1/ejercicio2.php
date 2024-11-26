<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Plantilla</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <form action="" method="post">
        <label for="barrio">Escribe el nombre de un barrio</label>
        <input type="string" name="barrioName" ><br><br>
        <input type="submit" value="COMPROBAR"><br><br>
    </form>
    <?php
    $barrios=[["Centro", 2543],["Huelin", 1109],["Malaga Este", 890],["Palma/Palmilla", 49]];

    echo "<table border=1px black>";
        echo "<thead>";
            echo "<tr>";
                echo "<th>BARRIO</th><th>Nº DE PISOS TURISTICOS</th>";
            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach($barrios as $barrio){
            list($nombre, $pisosT)=$barrio;
            echo "<tr><td>$nombre</td><td>$pisosT</td></tr>";
        }

        echo "</tbody>";
    echo "</table>";
    echo "<br><br><br>";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        /*Apartado 2.1 */
        $barrioEntrada= $_POST["barrioName"];
        $encontrado=false;
        for($i=0;$i<count($barrios)&&(!$encontrado);$i++){
            if($barrioEntrada==$barrios[$i][0]){
                $barrioSi=$barrios[$i];
                $encontrado=true;
                echo "<table border=1px black>";
                    echo "<thead>";
                        echo "<tr>";
                            echo "<th>BARRIO</th><th>Nº DE PISOS TURISTICOS</th>";
                        echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                        echo "<tr><td>$barrioSi[0]</td><td>$barrioSi[1]</td></tr>";
                    echo "</tbody>";
                echo "</table>";
                echo "<br><br><br>";
            }
            
        }
        /*Apartado 2.1.1 */
        if ($barrioSi[1]==0){
            echo "Este barrio NO tiene pisos turisticos";
        }
        /*Apartado 2.1.2 */
        elseif($barrioSi[1]>0&&$barrioSi[1]<=50){
            echo "Este barrio tiene POCOS pisos turisticos";
        }
        /*Apartado 2.1.3 */
        elseif($barrioSi[1]>50&&$barrioSi[1]<=1000){
            echo "Este barrio tiene BASTANTES pisos turisticos";
        }
        /*Apartado 2.1.4 */
        elseif($barrioSi[1]>1000){
            echo "Este barrio tiene DEMASIADOS pisos turisticos";
        }
        
}

    

    ?>
</body>
</html>