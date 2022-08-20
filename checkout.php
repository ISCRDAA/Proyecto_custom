<?php
include 'components/connect.php';


session_start();
if (isset($_SESSION['id_cliente'])) {
    $id_cliente = $_SESSION['id_cliente'];
} else {
    $id_cliente = '';
}

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

<!-- seccion pago inicio -->
<section class="checkout">

    <form action="" method="post">
        <h3>Productos del carrito</h3>

        <div class="cart">
            <?php
            $grand_total = 0;
            $cart_items[] = '';
            $select_cart= $conn->prepare("SELECT * FROM `carrito` WHERE id = ?");
            $select_cart->execute([$id_cliente]);

            if ($select_cart->rowCount() > 0){
                while ($fetch_cart= $select_cart->fetch(PDO::FETCH_ASSOC)){
                    $cart_items[] = ($fetch_cart['nombre'].'('.$fetch_cart['precio'].'x'.$fetch_cart['cantidad'].')-');
                    $total_products = implode($cart_items);
                    $grand_total += ($fetch_cart['precio'] * $fetch_cart['cantidad']);


                    ?>
                    <p> <span class="nom"><?=$fetch_cart['nombre'];?></span> <span class="precio" <?= $fetch_cart['precio'];?> x <?= $fetch_cart['cantidad'];?></span> </p>

                    <?php
                }
            }else{
                echo '<p class="empty"> Tu carrito esta vacio</p>';
            }

            ?>
            <p class="grand"><div class="name"> Total general :</div> <span class="price"> <?= $grand_total;?>  </span>  </p>
            <a href="carrito.php" class="btn"> Ver Carrito</a>
        </div>
        <input type="hidden" name="total_products" value="<?= $total_products;  ?>">
        <input type="hidden" name="total_price" value="<?= $grand_total;  ?>">
        <input type="hidden" name="producto" value="<?= $fetch_profile['nombre'];  ?>">
        <input type="hidden" name="email" value="<?= $fetch_profile['email'];  ?>">
        <input type="hidden" name="telefono" value="<?= $fetch_profile['telefono'];  ?>">
        <input type="hidden" name="direccion" value="<?= $fetch_profile['direccion'];  ?>">

        <div class="user-info">
            <h3> Informacion de el usuario</h3>
            <p> <i class="fas fa-user"></i><span> <?= $fetch_profile['nombre'];?></span></p>
            <p><i class="fas fa-envelope"></i><span><?= $fetch_profile['telefono'];?></span></p>
            <p><i class="fas fa-map-marker-alt"></i><span><?php if($fetch_profile['direccion']== ''){echo 'por favor ingresa tu direccion';}else{echo $fetch_profile['direccion'];}?></span></p>

        </div>

    </form>



</section>








<!-- seccion pago final -->









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