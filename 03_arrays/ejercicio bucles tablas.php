<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio bucles tablas</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
    $profes=array(
        "DWS" => "Alejandra",
        "DWC" => "Jaime",
        "DI" => "José",
        "DAW" => "Alejandro",
        "EN" => "Virginia"
    );

    echo "<table border='1'>";
        echo "<thead>";
            echo "<tr>";
                echo "<th>Asignatura</th>";
                echo "<th>Profesor</th>";
            echo "</tr>";
        echo  "</thead>";
        echo "<tbody>";
            foreach($profes as $asignatura => $profe){
                echo"<tr>";
                    echo "<td>$asignatura</td>";
                    echo "<td>$profe</td>";

                echo "</tr>";
            };
        echo "</tbody>";
    echo "</table>";

    ksort($profes);
            
    echo "<table border='1'>";
        echo "<thead>";
            echo "<tr>";
                echo "<th>Asignatura</th>";
                echo "<th>Profesor</th>";
            echo "</tr>";
        echo  "</thead>";
        echo "<tbody>";
            foreach($profes as $asignatura => $profe){
                echo"<tr>";
                    echo "<td>$asignatura</td>";
                    echo "<td>$profe</td>";

                echo "</tr>";
            };
        echo "</tbody>";
    echo "</table>";

    arsort($profes);

    echo "<table border='1'>";
        echo "<thead>";
            echo "<tr>";
                echo "<th>Asignatura</th>";
                echo "<th>Profesor</th>";
            echo "</tr>";
        echo  "</thead>";
        echo "<tbody>";
            foreach($profes as $asignatura => $profe){
                echo"<tr>";
                    echo "<td>$asignatura</td>";
                    echo "<td>$profe</td>";

                echo "</tr>";
            };
        echo "</tbody>";
    echo "</table>";
    ?>
</body>
</html>