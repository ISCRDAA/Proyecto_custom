<?php 
$ch = curl_init(); //Se inicia sesión cURL

$array =[
    'producto' => $_POST['producto'],
    'estilo' => $_POST['estilo'],
    'tamano' => $_POST['tamano'],
    'genero' => $_POST['genero'],
    'existencia' => $_POST['existencia'],
    'imagen' => $_POST['imagen'] ,
    'precio' => $_POST['precio'],
    'codigo_barras' =>$_POST['codigo'],
    'oferta' => $_POST['oferta'],

];



$data1 = http_build_query($array); //transforma los datos para una petición http
//print($data1);
curl_setopt( $ch, CURLOPT_URL, 'http://localhost/apicustom/');//Se le pas la URL de nuestro web service
curl_setopt($ch, CURLOPT_POST, true);//Indica el metodo de nuestra petición
curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);//es el medio por el cual  le pasamos las datos A POST
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);//retorna los datos en lugar 

$respuesta = curl_exec($ch); 
//print("respuesta: $respuesta");

if(curl_error($ch))echo curl_error($ch);// en caso de tener un error, lo imprime
else $decoded = json_decode($respuesta, true);

curl_close($ch);//se cierra la sesión
?>