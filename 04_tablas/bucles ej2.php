<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>clases de la semana</title>
</head>
<body>
    <?php
    //multiplos de 3
    $i=1;
    echo "<ul>";
    while($i<30){
        if($i%3==0){
            echo "<li>$i</li>";
        }
        $i++;
    }
    echo "</ul>"
    ?>
</body>
</html>