<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>clases de la semana</title>
</head>
<body>
    <?php
    $dia=date("l");
    $diaEs;
    $mes=date("m");
    $mespalabra;
    $diadelmes=date("d");
    $año=date("Y");
    
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
    switch($mes){
        case 1:
            $mespalabra="Enero";
            break;
        case 2:
            $mespalabra="Febrero";
            break;
        case 3:
            $mespalabra="Marzo";
            break;
        case 4:
            $mespalabra="Abril";
            break;
        case 5:
            $mespalabra="Mayo";
            break;
        case 6:
            $mespalabra="Junio";
            break;
        case 7:
            $mespalabra="Julio";
            break;
        case 8:
            $mespalabra="Agosto";
            break;
        case 9:
            $mespalabra="Septiembre";
            break;
        case 10:
            $mespalabra="Octubre";
            break;
        case 11:
            $mespalabra="Noviembre";
            break;
        case 12:
            $mespalabra="Diciembre";
            break;
    }
    echo "<h1>Hoy es $diaEs $diadelmes de $mespalabra de $año</h1>";



    ?>

    
</body>
</html>