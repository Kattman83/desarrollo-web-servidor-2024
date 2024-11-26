<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>estructura match</title>
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

    $resultado=match($diaEs){
        "Martes",
        "Miercoles",
        "Viernes"
         => "<p>Hoy $diaEs si hay clase de entorno servidor</p>",
         default =>"<p>Hoy $diaEs no hay clase de entorno servidor</p>"
    };
    echo $resultado;
    ?>
</body>

<html>