<?php
function calcular_precio_iva($precio,$tipoIVA){
    if($precio!=0){
        if($tipoIVA=="general"){
            $precioFinal=$precio*GENERAL;
            echo "El precio final es $precioFinal";
        }
        elseif($tipoIVA=="reducido"){
            $precioFinal=$precio*REDUCIDO;
            echo "El precio final es $precioFinal";
        }
        elseif($tipoIVA=="superreducido"){
            $precioFinal=$precio*SUPERREDUCIDO;
            echo "El precio final es $precioFinal";
        }
    }else{
        echo "Por favor rellena el formulario";
    }
}

?>