<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>EJERCICIO 1</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
    $personajes = [
        ["Goku","agua"],
        ["Django","fuego"],
        ["Terminator","metal"]
    ];
    /*foreach($videojuegos as $videojuego){
        print_r($videojuego);
    }
    foreach($personajes as $personaje){
        list($nombre, $element)=$personaje;
        echo "<p>$nombre, $element</p>";
    }*/

    /*Apartado 1.1*/
    $nuevo1=array("Mario Bros","agua");
    $nuevo2=array("Lagarto Juancho","tierra");
    array_push($personajes,$nuevo1);
    array_push($personajes,$nuevo2);

    /*Apartado1.2*/
    array_shift($personajes);

    /*foreach($personajes as $personaje){
        list($nombre, $element)=$personaje;
        echo "<p>$nombre, $element</p>";
    }*/
    /*Apartado 1.3 */
    for($i=0;$i<count($personajes);$i++){
        $personajes[$i][2]=rand(500,2000);
    }
    /*foreach($personajes as $personaje){
        list($nombre, $element, $ataque)=$personaje;
        echo "<p>$nombre, $element, $ataque</p>";
    }*/

    /*Aparatado 1.4 */
    for($i=0;$i<count($personajes);$i++){
        $personajes[$i][3]=rand(10000,30000);
    }
    /*foreach($personajes as $personaje){
        list($nombre, $element, $ataque, $vida)=$personaje;
        echo "<p>$nombre, $element, $ataque, $vida</p>";
    }*/

    /*Apartado 1.5 */
    for($i=0;$i<count($personajes);$i++){
        if($personajes[$i][3]>=20000){
            $personajes[$i][4]="Tanque";
        }
        elseif($personajes[$i][3]<20000 && $personajes[$i][2]>=1500){
            $personajes[$i][4]="Ataque";
        }
        else{
            $personajes[$i][4]="Soporte";
        }
    }
    /*foreach($personajes as $personaje){
        list($nombre, $element, $ataque, $vida, $tipo)=$personaje;
        echo "<p>$nombre, $element, $ataque, $vida, $tipo</p>";
    }*/

    /*Aparatado 1.6 */

    $_nombre=array_column($personajes,0);
    $_ataque=array_column($personajes,2);
    $_vida=array_column($personajes,3);
    $_elemento=array_column($personajes,1);
    array_multisort($_ataque, SORT_ASC, $_vida, SORT_ASC, $_elemento, SORT_ASC, $_nombre, SORT_ASC, $personajes);

    /*foreach($personajes as $personaje){
        list($nombre, $element, $ataque, $vida, $tipo)=$personaje;
        echo "<p>$nombre, $element, $ataque, $vida, $tipo</p>";
    }*/

    /*Apartado 1.7 */
    echo "<table border=1px black>";
        echo "<thead>";
            echo "<tr>";
                echo "<th>NOMBRE</th><th>ELEMENTO</th><th>ATAQUE</th><th>VIDA</th><th>TIPO</th>";
            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach($personajes as $personaje){
            list($nombre, $element, $ataque, $vida, $tipo)=$personaje;
            echo "<tr><td>$nombre</td><td>$element</td><td>$ataque</td><td>$vida</td><td>$tipo</td></tr>";
        }

        echo "</tbody>";
    echo "</table>";
    ?>
</body>
</html>