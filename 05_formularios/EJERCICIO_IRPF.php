<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Plantilla 2</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
<form action="" method="post">
        <label for="sueldo_bruto">Mete tu sueldo anual</label>
        <input type="number" name="bruto" id="bruto"><br><br>
        <br><br>
        <input type="submit" value="Calcular IRPF">
        <br><br>
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $bruto=(int)$_POST["bruto"];
        $rango1=12450;
        $rango2=20199;
        $rango3=35199;
        $rango4=59999;
        $rango5=299999;

        if($bruto<=$rango1){
            $irpf=$bruto*0.19;
        }
        elseif($bruto>$rango1&&$bruto<=$rango2){
            $diferencia=$bruto-$rango1;
            $irpf=($rango1*0.19)+$diferencia*0.24;
        }
        elseif($bruto>$rango2&&$bruto<=$rango3){
            $diferencia2=$rango2-$rango1;
            $diferencia3=$bruto-$rango2;
            $irpf=($rango1*0.19)+($diferencia2*0.24)+($diferencia3*0.3);
        }
        elseif($bruto>$rango3&&$bruto<=$rango4){
            $diferencia2=$rango2-$rango1;
            $diferencia3=$rango3-$rango2;
            $diferencia4=$bruto-$rango3;
            $irpf=($rango1*0.19)+($diferencia2*0.24)+($diferencia3*0.3)+($diferencia4*0.37);
        }
        elseif($bruto>$rango4&&$bruto<=$rango5){
            $diferencia2=$rango2-$rango1;
            $diferencia3=$rango3-$rango2;
            $diferencia4=$rango4-$rango3;
            $diferencia5=$bruto-$rango4;
            $irpf=($rango1*0.19)+($diferencia2*0.24)+($diferencia3*0.3)+($diferencia4*0.37)+($diferencia5*0.45);
        }
        elseif($bruto>$rango5){
            $diferencia2=$rango2-$rango1;
            $diferencia3=$rango3-$rango2;
            $diferencia4=$rango4-$rango3;
            $diferencia5=$rango5-$rango4;
            $diferencia6=$bruto-$rango5;
            $irpf=($rango1*0.19)+($diferencia2*0.24)+($diferencia3*0.3)+($diferencia4*0.37)+($diferencia5*0.45)+($diferencia6*0.47);
        }
        $salario_neto=$bruto-$irpf;

        echo "El salario neto es es $salario_neto";
    }
    ?>
</body>
</html>