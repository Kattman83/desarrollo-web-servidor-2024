<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>clases de la semana</title>
</head>
<body>
    <?php
    //multiplos de 3
    $i=0;
    $sumapares=0;
    do {
        if($i%2==0){
            $sumapares=$sumapares+$i;
        }
        $i++;
    }while ($i <= 20);
    
    echo $sumapares;
    ?>
</body>
</html>