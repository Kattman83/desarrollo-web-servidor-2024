<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
?>

<?php
$url="http://locahost/Ejercicios/PROFE/desarrollo-web-servidor-2024/06_bases_de_datos/animes/api/";
$curl=curl_init();
curl_setopt($curl, CURLOPT, $url) ;
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
$respuesta=curl_exec($curl);
curl_close($curl);

$estudios=json_decode($respuesta, true);

print_r($estudios);
?>