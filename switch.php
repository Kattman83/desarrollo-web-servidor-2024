<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
    $n = rand(1,10);
    $par=$n%2;
    
    switch($par){
        case 0:
            echo "<p>El número aleatorio es par</p>";
            break;
        case 1:
            echo "<p>El número aleatorio es impar</p>";
            break;
    }
    ?>
</body>
</html>