<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Arrays bidimensionales Horario Autobuses</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
<!-- 1: Añadir dos lineas de autobus
     2: Ordenar por duracion descendente
     3: Mostrar las lineas en una tabla
 -->
<table border=1px border-collapse:collapse>
        <thead>
        <tr>
        <th>salida</th>
        <th>llegada</th>"
        <th>duracion(minutos)</th>
        <th>precio(euros)</th>
        </tr>
        </thead>
    
    <?php
    $autobuses = [
        ["Málaga", "Ronda", 90, 10],
        ["Churriana", "Málaga", 20, 3],
        ["Málaga", "Granada", 120, 15],
        ["Torremolinos", "Málaga", 30, 3.5]
    ];

    $nuevalinea = ["Málaga", "Madrid", 300, 40];
    $nuevalinea2 = ["Jaén", "Málaga", 140, 20];

    array_push($autobuses, $nuevalinea);
    array_push($autobuses, $nuevalinea2);

    $_orderlinea = array_column($autobuses,2);
    array_multisort($_orderlinea, SORT_DESC,$autobuses);

    foreach($autobuses as $autobus){
        list($salida,$llegada,$duracion,$precio)=$autobus;
        
        echo "<tbody>";
        echo "<tr>";
        echo "<td>$salida</td>";
        echo "<td>$llegada</td>";
        echo "<td>$duracion</td>";
        echo "<td>$precio</td>";
        echo "</tr>";
        echo "</tbody>";
        
    }
    
    ?>
    </table>
</body>
</html>