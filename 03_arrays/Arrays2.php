<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Arrays personas</title>
    <?php
    /*error_reporting( E_ALL );
    ini_set( "display_errors", 1 );*/
    ?>
</head>
<body>
    <?php

    $personas=array(
        "25865478-j"=> "Fulanito Gómez",
        "35641258-l"=> "Menganito Pérez",
        "23248465-k"=> "Anonimo Sánchez"
    );
    print_r($personas);

    echo $personas["35641258-l"];
    /*array_values --> reordena el array */

    echo "<h3>personas y sus dni </h3>";
    echo "<ol>";
    foreach($personas as $dni => $persona){
        echo"<li>$dni, $persona</li>";
    }
    echo "</ol>";

    echo "<table border='1'>";
        echo "<thead>";
            echo "<tr>";
                echo "<th>DNI</th>";
                echo "<th>Nombre</th>";
            echo "</tr>";
        echo  "</thead>";
        echo "<tbody>";
            foreach($personas as $dni => $persona){
                echo"<tr>";
                    echo "<td>$dni</td>";
                    echo "<td>$persona</td>";

                echo "</tr>";
            }
        echo "</tbody>";
    echo "</table>";
    ?>
</body>
</html>