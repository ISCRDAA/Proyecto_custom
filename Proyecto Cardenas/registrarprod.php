<?php
include'conexion.php';
$pdo=new Conexion();







echo "Nombre de producto: {$_POST['producto']}<br>";
echo "Estilo: " . $_POST['estilo'] . "<br>";
echo "Tamaño : ". $_POST['tamano'] . "<br>";
echo "Genero: " . $_POST['genero'] . "<br>";
echo "Existencias: " . $_POST['existencia'] . "<br>";
echo "Imagen: " . $_POST['imagen'] . "<br>";
echo "Precio: " . $_POST['precio'] . "<br>";
echo "Codigo de Barras: " . $_POST['codigo'] . "<br>";
echo "Oferta: " . $_POST['oferta'] . "<br>";






/////instruccion para insertar
$sql=$pdo->prepare("INSERT INTO `productos`(`producto`, `estilo`, `tamaño`, `genero`, `existencia`, `imagen`, `precio`, `codigo_barras`, `oferta`)
 VALUES ('{$_POST['producto']}','{$_POST['estilo']}','{$_POST['tamano']}','{$_POST['genero']}','{$_POST['existencia']}',
 '{$_POST['imagen']}','{$_POST['precio']}','{$_POST['codigo']}','{$_POST['oferta']}')");
$sql->execute();
$sql->setFetchMode(PDO::FETCH_ASSOC);
$res = $sql->fetchAll();

//$instruccion="insert into alquiler (Habitacion,Fecha_llegada,Fecha_Salida,Nombre_Usuario,Direccion,No_Personas)values
//('{$_POST['numero']}','{$_POST['llegada']}','{$_POST['salida']}','{$_POST['nombre']}','{$_POST['direccion']}','{$_POST['ocupantes']}')";


?>