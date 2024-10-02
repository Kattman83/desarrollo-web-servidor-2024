<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>ejercicio aprobados suspensos</title>
    <?php
    /*error_reporting( E_ALL );
    ini_set( "display_errors", 1 );*/
    ?>
</head>
<body>
    <?php

    $alumnos=array(
        "Guillermo"=> 3,
        "Daiana"=> 5,
        "Ángel"=> 8,
        "Ayyoub"=> 7,
        "Mateo"=> 9,
        "Joaquín"=> 4
    );
    print_r($alumnos);


    echo "<h3>notas alumnos</h3>";

    echo "<table border='1'>";
        echo "<thead>";
            echo "<tr>";
                echo "<th>Alumno</th>";
                echo "<th>Nota</th>";
                echo "<th>Aprobado o Suspenso</th>";
            echo "</tr>";
        echo  "</thead>";
        echo "<tbody>";
            foreach($alumnos as $alumno => $nota){
                echo"<tr>";
                    echo "<td>$alumno</td>";
                    echo "<td>$nota</td>";
                    if($nota < 5){
                        echo "<td>Suspenso</td>";
                    }
                    elseif($nota<7&&$nota>4){
                        echo "<td>Aprobado</td>";
                    }
                    elseif($nota>6&&$nota<9){
                        echo "<td>Notable</td>";
                    }
                    elseif($nota>8&&$nota<=10){
                        echo "<td>Sobresaliente</td>";
                    }


                echo "</tr>";
            }
        echo "</tbody>";
    echo "</table>";
    ?>
</body>
</html>