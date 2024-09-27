<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
    $n = rand(1,3);

    switch($n){
        case 1:
            echo "<p>El número aleatorio es $n</p>";
            break;
        case 2:
            echo "<p>El número aleatorio es $n</p>";
            break;
        default:
            echo "<p>El número aleatorio es $n</p>";
            break;
    }
    ?>
</body>
</html>