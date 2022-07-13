<?php

//Petición GET
$data = json_decode( file_get_contents('http://localhost/apicustom/'), true );

print_r($data);

echo "<br>";
for($i=0; $i<count($data); $i++) {
    echo ($data[$i]["producto"]."<br>");
}
/*


//Petición POST
    print("ENTRO DENTRO DE L FUNCION");
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
    print($data1);
    curl_setopt( $ch, CURLOPT_URL, 'http://localhost/apicustom/');//Se le pas la URL de nuestro web service
    curl_setopt($ch, CURLOPT_POST, true);//Indica el metodo de nuestra petición
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);//es el medio por el cual  le pasamos las datos A POST
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);//retorna los datos en lugar 

    $respuesta = curl_exec($ch); 
    print("respuesta: $respuesta");

    if(curl_error($ch))echo curl_error($ch);// en caso de tener un error, lo imprime
    else $decoded = json_decode($respuesta, true);

    //if($respuesta){
    //foreach ($decoded as $Index => $value){
    //echo "$Index: $value <br>";
    //}
    //}

    curl_close($ch);//se cierra la sesión


/*
//Petición PUT
$url = "http://localhost/apicustom/index.php?";
$ch = curl_init(); //Se inicia sesión cURL

$array = array(
    'producto' => 'Gorra Capitán America',
    'estilo' => '3Taza de porcelana en color blanco con sublimado de enamorados',
    'tamano' => 'Tarro',
    'genero' => 'Unisex',
    'existencia' => '50',
    'imagen' => 'tazapareja.jpg',
    'precio' => '122',
    'codigo_barras' => '1092837654409',
    'oferta' => 'No'

);

foreach(array_keys($array) as  $llave){
    $valor = $array[$llave];
    $valor2 = str_replace(' ', '%20', $valor);
    $url .=$llave."=".$valor2."&";

}


$data1 = http_build_query($array); //transforma los datos para una petición http7


curl_setopt( $ch, CURLOPT_URL, $url);//Se le pas la URL de nuestro web service
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');//Indica el metodo de nuestra petición
//curl_setopt($ch, CURLOPT_POSTFIELDS, $newphrase);//es el medio por el cual  le pasamos las datos A POST
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);//retorna los datos en lugar 


$respuesta = curl_exec($ch); 
print("<br> respuesta:$respuesta ");

if(curl_error($ch))echo curl_error($ch);// en caso de tener un error, lo imprime
else $decoded = json_decode($respuesta, true);


//foreach ($decoded as $Index => $value){
//echo "$Index: $value <br>";
//}


curl_close($ch);//se cierra la sesión



//Petición DELETE
$url = "http://localhost/apicustom/index.php?";
$ch = curl_init(); //Se inicia sesión cURL

$array = array(
    'producto' => 'Gorra Capitán America',
    //'estilo' => '3Taza de porcelana en color blanco con sublimado de enamorados',
    //'tamano' => 'Tarro',
    //'genero' => 'Unisex',
    //'existencia' => '50',
    //'imagen' => 'tazapareja.jpg',
    //'precio' => '122',
    //'codigo_barras' => '1092837654409',
    //'oferta' => 'No'

);

foreach(array_keys($array) as  $llave){
    $valor = $array[$llave];
    $valor2 = str_replace(' ', '%20', $valor);
    $url .=$llave."=".$valor2."&";

}

var_dump($url);

$data1 = http_build_query($array); //transforma los datos para una petición http7


curl_setopt( $ch, CURLOPT_URL, $url);//Se le pas la URL de nuestro web service
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');//Indica el metodo de nuestra petición
//curl_setopt($ch, CURLOPT_POSTFIELDS, $newphrase);//es el medio por el cual  le pasamos las datos A POST
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);//retorna los datos en lugar 


$respuesta = curl_exec($ch); 
print("<br> respuesta:$respuesta ");

if(curl_error($ch))echo curl_error($ch);// en caso de tener un error, lo imprime
else $decoded = json_decode($respuesta, true);


//foreach ($decoded as $Index => $value){
//echo "$Index: $value <br>";
//}


curl_close($ch);//se cierra la sesión
*/
?>