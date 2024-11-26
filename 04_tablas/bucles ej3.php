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
    do {
        if($i%3==0){
            echo "<li>$i</li>";
        }
        $i++;
    }while ($i <= 30);
    echo "</ul>"
    ?>
</body>
</html>