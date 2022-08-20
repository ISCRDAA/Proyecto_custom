<?php

if(isset($_POST['add_to_cart'])){
    if($id_cliente ==''){
        header('location:login.php');

    }else {
        $pid = $_POST['pid'];
        $pid = filter_var($pid,FILTER_SANITIZE_STRING);
        $producto = $_POST['producto'];
        $producto = filter_var($producto, FILTER_SANITIZE_STRING);
        $precio = $_POST['precio'];
        $precio = filter_var($precio, FILTER_SANITIZE_STRING);
        $imagen = $_POST['imagen'];
        $imagen = filter_var($imagen, FILTER_SANITIZE_STRING);
        $qty = $_POST['qty'];
        $qty = filter_var($qty, FILTER_SANITIZE_STRING);

        $check_cart_numbers = $conn->prepare("SELECT * FROM `carrito` WHERE $pid = ? AND nombre = ?");
        $check_cart_numbers->execute([$producto,$pid]);

        if ($check_cart_numbers->rowCount() > 0) {
            $message[] = 'ya se encuentra en el carrito';

        } else {
            $insert_cart = $conn->prepare("INSERT INTO `carrito`(pid,nombre,precio,	cantidad,imagen) VALUES(?,?,?,?,?)");
            $insert_cart->execute([$pid,$producto, $precio,$qty,$imagen]);
            $message[] = 'Añadido al carrito';
        }
    }
}






?>