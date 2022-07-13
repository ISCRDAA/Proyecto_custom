<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://localhost/apicustom/index.php?");

$data = array(
    'producto' => '1Taza de Enamorados',
    'estilo' => 'Taza de porcelana en color blanco con sublimado de enamorados',
    'tamano' => 'Tarro',
    'genero' => 'Unisex',
    'existencia' => '50',
    'imagen' => 'tazapareja.jpg',
    'precio' => '122',
    'codigo_barras' => '1092837654409',
    'oferta' => 'No'

);
$httpQuery = http_build_query($data);
var_dump($httpQuery);
/*$headers = array(
    'Accept: application/json',
    'Content-Length: ' . strlen($httpQuery)
);*/
//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//$username = 'XXX';
//$password = 'XXX';
//curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
//curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
//curl_setopt($ch, CURLOPT_HEADER, 0);
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS,$httpQuery);

$output = curl_exec($ch);
 print("respuetsa <br>$output");
curl_close($ch);
?>