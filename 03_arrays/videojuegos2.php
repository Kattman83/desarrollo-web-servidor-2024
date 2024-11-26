<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Arrays bidimensionales</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
<table border=1px>
        <thead>
        <tr>
        <th>Nombre juego</th>
        <th>Género</th>"
        <th>precio(euros)</th>
        <th>Gratuito</th>
        </tr>
        </thead>
    
    <?php
    $videojuegos = [
        ["FC 24","Deporte",70],
        ["Dark souls","Soulslike", 50],
        ["Hollow Knight","Plataformas",30]
    ];
    /*foreach($videojuegos as $videojuego){
        print_r($videojuego);
    }
    foreach($videojuegos as $videojuego){
        list($titulo, $categoria, $precio)=$videojuego;
        echo "<p>$titulo, $categoria, $precio</p>";
    }*/
    $nuevojuego=["Mario Bro","Plataformas",0];
    $nuevojuego2=["NBA 2K20","Deportes",0];
    array_push($videojuegos, $nuevojuego);
    array_push($videojuegos, $nuevojuego2);

    for($i=0;$i<count($videojuegos);$i++){
        if ($videojuegos[$i][2]===0){
            $videojuegos[$i][3] = "Si";
        }else{
            $videojuegos[$i][3] = "No";
        }
        
    }
    foreach($videojuegos as $videojuego){
        list($nombrejuego,$tipo,$precio,$gratis)=$videojuego;
        
        echo "<tbody>";
        echo "<tr>";
        echo "<td>$nombrejuego</td>";
        echo "<td>$tipo</td>";
        echo "<td>$precio</td>";
        echo "<td>$gratis</td>";
        echo "</tr>";
        echo "</tbody>";    
    }

    ?>
</table>
</body>
</html>