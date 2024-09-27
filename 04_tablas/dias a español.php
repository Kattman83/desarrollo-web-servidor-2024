<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>clases de la semana</title>
</head>
<body>
    <?php
    $dia=date("l");
    $diaEs;
    
    switch($dia){
        case 'Monday':
            $diaEs="Lunes";
            break;
        case 'Tuesday':
            $diaEs="Martes";
            break;
        case 'Wednesday':
            $diaEs="Miercoles";
            break;
        case 'Thursday':
            $diaEs="Jueves";
            break;
        case 'Friday':
            $diaEs="Viernes";
            break;
        case 'Saturday':
            $diaEs="Sabado";
            break;
        case 'Sunday':
            $diaEs="Domingo";
            break;
    }
    echo "<h1>Hoy es $diaEs</h1>";
    ?>
    
</body>
</html>