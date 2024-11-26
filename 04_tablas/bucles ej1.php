<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>bucles</title>
</head>
<body>
    <h3>lista 1</h3>
    <?php
    $i=1;
    echo "<ul>";
    while($i<10){
        echo "<li>$i</li>";
        $i++;
    }
    echo "</ul>"
    ?>
    <h3>lista 2</h3>
    <?php
    $i=1;
    echo "<ul>";
    while($i<10):
        echo "<li>$i</li>";
        $i++;
    endwhile;
    echo "</ul>"
    ?>
</body>
</html>