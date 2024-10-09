<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Plantilla</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
<!--
    CREAR UN FORMULARIO QUE RECIBA UN NUMERO. SE MOSTRARÁ EN UNA TABLA HTML 
    DE MULTIPLICAR DE ESE NUMERO EJEMPLO:
    3X1=3
    3X2=6
    3X3=9
    ...
    3X9=27
-->
    <form action="" method="post">
        
        <p>INTRODUCE NUMERO:</p><input type="number" name="num" >
        <input type="submit" value="CREAR TABLA">
    </form>


    <?php
    echo "<table border=1px>";
    echo "<tbody>";
    
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $numero=(int)$_POST["num"];
        for($i=0;$i<11;$i++){
            $resultado=$numero*$i;
            echo "<tr>"; 
            echo "<td>$numero X $i</td> <td>= $resultado</td>";
            echo "</tr>";
        }
    
        

    }
    
    echo "</tbody>";
    echo "</table>";
    ?>
</body>
</html>