<?php
include 'components/connect.php';


session_start();
if (isset($_SESSION['id_cliente'])) {
$id_cliente = $_SESSION['id_cliente'];
} else {
$id_cliente = '';
header('location:index.php');
}

if(isset($_POST['update_qty'])){
    $cart_id = $_POST['cart_id'];
    $cart_id = filter_var($cart_id, FILTER_SANITIZE_STRING);
    $qty = $_POST['qty'];
    $qty = filter_var($qty, FILTER_SANITIZE_STRING);
    $update_qty = $conn->prepare("UPDATE `carrito` SET cantidad = ? WHERE id = ?");
    $update_qty->execute([$qty,$cart_id]);
    $message[] = 'la cantidad se ha modificado';
}

if (isset($_POST['delete_cart'])){
    $cart_id = $_POST['cart_id'];
    $cart_id = filter_var($cart_id,FILTER_SANITIZE_STRING);
    $delete_cart = $conn ->prepare("DELETE FROM `carrito` WHERE id = ?");
    $delete_cart->execute([$cart_id]);
    $message[] = 'el contenido del carrito se ha borrado';


}
if (isset($_POST['delete_all'])){

    $delete_cart = $conn ->prepare("DELETE FROM `carrito` WHERE id = ?");
    $delete_cart->execute([$id_cliente]);
    $message[] = 'Borrar todos los productos';


}


include 'components/add_carrito.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal</title>

    <!--Link de la fuente de awesome -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- link de la hoja de estilos -->
    <link rel="stylesheet" href="css/estilo.css">

</head>

<body>


<!-- seccion header inicio -->

<?php include 'components/user_header.php' ?>

<!-- seccion header fin -->


<div class="heading">
    <h3>Carrito de compra</h3>
    <p>carrito / <a href="index.php">Inicio</a></p>
</div>
<!-- seccion carrito inicio-->

<section class="products">
    <h1 class="title">Tu carrito de compra</h1>
    <div class="box-container">

        <?php
            $grand_total = 0;
            $select_cart= $conn->prepare("SELECT * FROM `carrito` WHERE id = ?");
            $select_cart->execute([$id_cliente]);

            if ($select_cart->rowCount() > 0){
                while ($fetch_cart= $select_cart->fetch(PDO::FETCH_ASSOC)){


        ?>
         <form action="" method="POST" class="box">
             <input type="hidden" name="cart_id" value="<?= $fetch_cart['id'];?>">
             <button type="submit" name="delete_cart" class="fas fa-times" onclick="return confirm('Eliminar este producto ?');"></button>
             <img src="uploaded_img/<?= $fetch_cart['imagen']; ?>" class="image" alt="">
             <div class="name"><?= $fetch_cart['nombre']; ?> </div>
             <div class="flex">
                 <div class="price"><span>$</span><?= $fetch_cart['precio']; ?></div>
                 <input type="number" name="qty" class="qty" value="<?= $fetch_cart['cantidad']; ?>" min="1"  max="99" maxlength="2">
                 <button type="submit" name="update_qty" class="fas fa-edit"></button>
             </div>
             <div class="sub-total"> sub total : <span><?= $sub_total = ($fetch_cart['precio'] * $fetch_cart['cantidad']); ?></span></div>
         </form>
        <?php
            $grand_total += $sub_total;
                }
            }else{
                echo '<p class="empty"> Tu carrito esta vacio</p>';
            }

        ?>


    </div>

    <div class="cart-total">
        <p class="grand-total">Total: <span> <?=$grand_total; ?></span></p>
        <a href="checkout.php" class="btn" <?= ($grand_total > 1)?'': 'disabled'?> >Proceder a pagar </a>

    </div>
    <div class="more-btn">
        <form action="" method="post">
            <button type="submit" class="delete-btn">Eliminar todo lo del carrito</button>

        </form>
    </div>
</section>


<!-- seccion carrito fin -->








<div class="loader">
    <img src="images/loader.gif" alt="">
</div>

<!-- seccion footer inicio -->
<?php include 'components/footer.php' ?>
<!-- sección footer fin -->

<!--  Apartado de los links de js -->
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>
    var swiper = new Swiper(".hero-slider", {
        loop: true,
        effect: "flip",
        grabCursor: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    })
</script>

</body>

</html>