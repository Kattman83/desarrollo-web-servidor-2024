<?php
    function calcular_potencia($base,$exponente){
        if($base==""){
            echo "Por favor introduce base <br>";
        }
        if($exponente==""){
            echo "Por favor introduce exponente <br>";
        }
        if($base!=""&&$exponente!=""){
            $resultado=pow($base,$exponente);
            echo "La potencia de $base elevado a $exponente es $resultado";
        }
    }

?>