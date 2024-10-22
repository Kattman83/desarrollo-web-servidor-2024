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
        <label for="money">INTRODUCE UNA CANTIDAD</label>
        <input type="number" name="money" id="money"><br><br>
        <label for="divisa_inicial">DIVISA ORIGEN</label>
        <select name="divisa_inicial" id="divisa_inicial">
            <option value="euros">EUROS</option>
            <option value="dolares">DOLARES</option>
            <option value="yenes">YENES</option>
        </select><br><br>
        <label for="divisa_final">DIVISA DESTINO</label>
        <select name="divisa_final" id="divisa_final">
            <option value="euros">EUROS</option>
            <option value="dolares">DOLARES</option>
            <option value="yenes">YENES</option>
        </select><br><br>
        <input type="submit" value="CAMBIO">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $cantidad_inicial=$_POST["money"];
        $cantidad_final=0;
        $divisa_origen=$_POST["divisa_inicial"];
        $divisa_destino=$_POST["divisa_final"];
        if($divisa_origen==$divisa_destino){
            $cantidad_final=$cantidad_inicial;
        }
        elseif($divisa_origen=="euros"&&$divisa_destino=="dolares"){
            $cantidad_final=$cantidad_inicial*1.09;
        }
        elseif($divisa_origen=="euros"&&$divisa_destino=="yenes"){
            $cantidad_final=$cantidad_inicial*163.38;
        }
        elseif($divisa_origen=="dolares"&&$divisa_destino=="euros"){
            $cantidad_final=$cantidad_inicial*0.92;
        }
        elseif($divisa_origen=="dolares"&&$divisa_destino=="yenes"){
            $cantidad_final=$cantidad_inicial*149.67;
        }
        elseif($divisa_origen=="yenes"&&$divisa_destino=="dolares"){
            $cantidad_final=$cantidad_inicial*0.0067;
        }
        elseif($divisa_origen=="yenes"&&$divisa_destino=="euros"){
            $cantidad_final=$cantidad_inicial*0.0061;
        }

        echo "$cantidad_inicial $divisa_origen son $cantidad_final $divisa_destino";
    }
    ?>
</body>
</html>