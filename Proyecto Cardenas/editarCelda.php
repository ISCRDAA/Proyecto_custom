<?php
include_once("db_connect.php");
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {   
    $update_field='';
    if(isset($input['estilo'])) {
        $update_field.= "estilo='".$input['estilo']."'";
    } else if(isset($input['tamano'])) {
        $update_field.= "tamano='".$input['tamano']."'";
    } else if(isset($input['genero'])) {
        $update_field.= "genero='".$input['genero']."'";
    } else if(isset($input['existencia'])) {
        $update_field.= "existencia='".$input['existencia']."'";
    } else if(isset($input['imagen'])) {
        $update_field.= "imagen='".$input['imagen']."'";
    } else if(isset($input['precio'])) {
        $update_field.= "precio='".$input['precio']."'";
    } else if(isset($input['codigo_barras'])) {
        $update_field.= "codigo_barras='".$input['codigo_barras']."'";
    } else if(isset($input['oferta'])) {
        $update_field.= "oferta='".$input['oferta']."'";
    }   
    if($update_field && $input['producto']) {
        $url = "http://localhost/apicustom/index.php?";
        $ch = curl_init(); //Se inicia sesión cURL
        
        $array = array(
            'producto' => $_POST['producto'],
            'estilo' => $_POST['estilo'],
            'tamano' => $_POST['tamano'],
            'genero' => $_POST['genero'],
            'existencia' => $_POST['existencia'],
            'imagen' => $_POST['imagen'] ,
            'precio' => $_POST['precio'],
            'codigo_barras' =>$_POST['codigo'],
            'oferta' => $_POST['oferta'],
        
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
    }
}
