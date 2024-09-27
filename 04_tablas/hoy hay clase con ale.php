<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>clases de la semana</title>
</head>
<body>
    <?php
    $dia=date("l");
    echo "<h1>Hoy es $dia</h1>";

    switch($dia){
        case 'Monday':
            echo "<p> Hoy no tenemos entorno servidor</p>";
            break;
        case 'Tuesday':
            echo "<p> Hoy si tenemos entorno servidor</p>";
            break;
        case 'Wednesday':
            echo "<p> Hoy si tenemos entorno servidor</p>";
            break;
        case 'Thursday':
            echo "<p> Hoy no tenemos entorno servidor</p>";
            break;
        case 'Friday':
            echo "<p> Hoy si tenemos entorno servidor</p>";
            break;
        case 'Saturday':
            echo "<p> Hoy no tenemos entorno servidor, es finde!!</p>";
            break;
        case 'Sunday':
            echo "<p> Hoy no tenemos entorno servidor, es finde!!</p>";
            break;
    }
    ?>
    
</body>
</html>