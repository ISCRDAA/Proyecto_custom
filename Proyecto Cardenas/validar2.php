<?php
$usuario=$_POST["usuar"];
$contrasena=$_POST["pass"];
session_start();
$_SESSION["usuar"]=$usuario;

include'conexion.php';
$pdo=new Conexion();

$sql=$pdo->prepare("SELECT * FROM usuarios WHERE usuario ='$usuario' and contraseña = '$contrasena'");
$sql->execute();
$sql->setFetchMode(PDO::FETCH_ASSOC);
$res = $sql->fetchAll();


if ( $res){
   
    header("location:admprod.php?Usuar=$usuario&Contra=$contrasena");
    
}else{
    ?>
    <?php
    include("logeo.php");
    ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($c);
?> 