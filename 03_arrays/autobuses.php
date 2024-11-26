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
     4: Insertar 3 Autobuses más
     5: Ordenar primero por el origen, luego por el destino
     6: Ordenar primero por la duración, luego por el precio
 -->
<table border=1px>
        <thead>
        <tr>
        <th>salida</th>
        <th>llegada</th>"
        <th>duracion(minutos)</th>
        <th>precio(euros)</th>
        <th>tipo</th>
        </tr>
        </thead>
    
    <?php
    $autobuses = [
        ["Málaga", "Ronda", 90, 10],
        ["Churriana", "Málaga", 20, 3],
        ["Málaga", "Granada", 120, 15],
        ["Torremolinos", "Málaga", 30, 3.5]
    ];
/*1*/
    $nuevalinea = ["Málaga", "Madrid", 300, 40];
    $nuevalinea2 = ["Jaén", "Málaga", 140, 20];

    array_push($autobuses, $nuevalinea);
    array_push($autobuses, $nuevalinea2);
/*2
    $_orderlinea = array_column($autobuses,2);
    array_multisort($_orderlinea, SORT_DESC,$autobuses);
3
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
    4*/
    $nuevalinea3 = ["Málaga", "Medellín", 34930, 0];
    $nuevalinea4 = ["Transilvania", "Málaga", 24342, 50];
    $nuevalinea5 = ["Singapur", "Málaga", 4589230, 50];
    array_push($autobuses, $nuevalinea3);
    array_push($autobuses, $nuevalinea4);
    array_push($autobuses, $nuevalinea5);

    $_origen= array_column($autobuses,0);
    $_destino= array_column($autobuses,1);
    array_multisort($_origen, SORT_ASC, $_destino, SORT_ASC, $autobuses);
    
    for($i=0;$i<count($autobuses);$i++){
        if ($autobuses[$i][2]<=30){
            $autobuses[$i][4] = "Corta distancia";
        }elseif(($autobuses[$i][2]>30)&&($autobuses[$i][2]<=120)){
            $autobuses[$i][4] = "Media distancia";
        }else{
            $autobuses[$i][4] = "Larga distancia";
        }
        
    }
    foreach($autobuses as $autobus){
        list($salida,$llegada,$duracion,$precio,$tipo)=$autobus;
        
        echo "<tbody>";
        echo "<tr>";
        echo "<td>$salida</td>";
        echo "<td>$llegada</td>";
        echo "<td>$duracion</td>";
        echo "<td>$precio</td>";
        echo "<td>$tipo</td>";
        echo "</tr>";
        echo "</tbody>";    
    }

    ?>
    </table>
</body>
</html>