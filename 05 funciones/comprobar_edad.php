<?php
    function comprobar_edad($nombre,$edad){
        if($nombre==""){
            echo "Porfavor introduce nombre <br>";
        }
        if($edad==""){
            echo "Porfavor introduce edad <br>";
        }
        if($nombre!=""&&$edad!=""){
            echo "$nombre tiene $edad años";
        }
    }

?>