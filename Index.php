<?php 
include'conexion.php';
$pdo=new Conexion();

if ($_SERVER['REQUEST_METHOD']=='GET'){
    if(isset($_GET['producto'])){
        $sql=$pdo->prepare("SELECT * FROM productos WHERE producto = :producto");
        $sql ->bindValue (':producto', $_GET['producto']);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        header( "HTTPS/1.1 200 OK");
        echo json_encode($sql->fetchAll());
        exit;
    }else {
        $sql= $pdo -> prepare("SELECT * FROM productos");
        $sql -> execute();
        $sql -> setFetchMode(PDO::FETCH_ASSOC);
        header("HTTP/1.1 200 OK");
        echo json_encode($sql->fetchAll());
        exit;
    }
}


if ($_SERVER['REQUEST_METHOD']=='POST'){

$sql="INSERT INTO `productos`(`producto`, `estilo`, `tamano`, `genero`, `existencia`, `imagen`, `precio`, `codigo_barras`, `oferta`)
 VALUES (:producto,:estilo,:tamano,:genero,:existencia,:imagen,:precio,:codigo_barras,:oferta)";
    //$sql="INSERT INTO productos(producto,estilo,tamano,genero,existencia,imagen,precio,codigo_barras,oferta) VALUES (:producto,:estilo,:tamano,:genero,:existencia,:imagen,:precio,:codigo_barras,:oferta)";
    $stmt=$pdo->prepare($sql);
    $stmt->bindValue(':producto',$_POST['producto']);
    $stmt->bindValue(':estilo',$_POST['estilo']);
    $stmt->bindValue(':tamano',$_POST['tamano']);
    $stmt->bindValue(':genero',$_POST['genero']);
    $stmt->bindValue(':existencia',$_POST['existencia']);
    $stmt->bindValue(':imagen',$_POST['imagen']);
    $stmt->bindValue(':precio',$_POST['precio']);
    $stmt->bindValue(':codigo_barras',$_POST['codigo_barras']);
    $stmt->bindValue(':oferta',$_POST['oferta']);
    $stmt->execute();
	$idPost=$pdo->lastInsertId();
	if($idPost){
	header("HTTP/1.1 200 OK");
	echo json_encode($idPost);
    return ("HTTP/1.1 200 OK");
	exit;	
	}
}


if ($_SERVER['REQUEST_METHOD']=='PUT'){
    $sql = "UPDATE `productos` SET `estilo`=:estilo,`tamano`=:tamano,`genero`=:genero,
    `existencia`=:existencia,`imagen`=:imagen,`precio`=:precio,
    `codigo_barras`=:codigo_barras,`oferta`=:oferta WHERE `producto`=:producto";
    //$sql = "UPDATE productos SET estilo=:estilo, tamaño=:tamaño,
   // genero=:genero, existencia=:existencia, imagen=:imagen, precio=:precio,
     //codigo_barras=:codigo_barras, oferta=:oferta   WHERE producto=:producto";
     $stmt=$pdo->prepare($sql);
    $stmt->bindValue(':producto',$_GET['producto']);
    $stmt->bindValue(':estilo',$_GET['estilo']);
    $stmt->bindValue(':tamano',$_GET['tamano']);
    $stmt->bindValue(':genero',$_GET['genero']);
    $stmt->bindValue(':existencia',$_GET['existencia']);
    $stmt->bindValue(':imagen',$_GET['imagen']);
    $stmt->bindValue(':precio',$_GET['precio']);
    $stmt->bindValue(':codigo_barras',$_GET['codigo_barras']);
    $stmt->bindValue(':oferta',$_GET['oferta']);
    $stmt->execute();//se ejecuta la accion
    header("HTTP/1.1 200 OK");
        exit;
        
}

if ($_SERVER['REQUEST_METHOD']=='PATCH'){
    $sql = "UPDATE `productos` SET `estilo`=:estilo,`tamano`=:tamano,`genero`=:genero,
    `existencia`=:existencia,`imagen`=:imagen,`precio`=:precio,
    `codigo_barras`=:codigo_barras,`oferta`=:oferta WHERE `producto`=:producto";
    //$sql = "UPDATE productos SET estilo=:estilo, tamaño=:tamaño,
   // genero=:genero, existencia=:existencia, imagen=:imagen, precio=:precio,
     //codigo_barras=:codigo_barras, oferta=:oferta   WHERE producto=:producto";
    $stmt=$pdo->prepare($sql);
    $stmt->bindValue(':producto',$_GET['producto']);
    $stmt->bindValue(':estilo',$_GET['estilo']);
    $stmt->bindValue(':tamano',$_GET['tamano']);
    $stmt->bindValue(':genero',$_GET['genero']);
    $stmt->bindValue(':existencia',$_GET['existencia']);
    $stmt->bindValue(':imagen',$_GET['imagen']);
    $stmt->bindValue(':precio',$_GET['precio']);
    $stmt->bindValue(':codigo_barras',$_GET['codigo_barras']);
    $stmt->bindValue(':oferta',$_GET['oferta']);
    $stmt->execute();//se ejecuta la accion
    header("HTTP/1.1 200 OK");
        exit;
        
}

if ($_SERVER['REQUEST_METHOD']=='DELETE'){
    $sql = "DELETE FROM productos WHERE producto=:producto";
    $stmt=$pdo->prepare($sql);
    $stmt->bindValue(':producto',$_GET['producto']);
    $stmt->execute();//se ejecuta la accion
    header("HTTP/1.1 200 OK");
        exit;
        
}  



?>