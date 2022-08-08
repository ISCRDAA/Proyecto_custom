<?php
include 'components/connect.php';


session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista rapida del producto</title>

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

<!-- categoria productos seccion  inicio-->

<section class="quick-view">
    <h1 class="title"> Vista rapida de los productos </h1>

    <section class="products">

        <div class="box-container">
            <?php
            $pid = $_GET['pid'];
            $select_products = $conn->prepare("SELECT * FROM `productos` WHERE  producto = ?");
            $select_products->execute([$pid]);
            if ($select_products->rowCount() > 0)  {
                while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <form action="" method="POST" class="box">
                        <input type="hidden" name="producto" value="<?= $fetch_products['producto']; ?>">
                        <input type="hidden" name="precio" value="<?= $fetch_products['precio']; ?>">
                        <input type="hidden" name="imagen" value="<?= $fetch_products['imagen']; ?>">
                        <a href="vista rapida.php?pid=<?= $fetch_products['producto']; ?>" class="fas fa-eye"></a>
                        <button type="submit" name="add_to_cart" class="fas fa-shopping-cart"></button>
                        <img src="uploaded_img/<?= $fetch_products['imagen']; ?>" class="image" alt="">
                        <div class="name"><?= $fetch_products['estilo']; ?></div>
                        <div class="flex">
                            <div class="price"><span>$</span><?= $fetch_products['precio']; ?></div>
                            <input type="number" name="qty" class="qty" value="1" min="1"
                                   max="99" maxlength="2">


                        </div>
                    </form>

                    <?php
                }
            }else {
                echo '<div class="empty">No hay productos por el momento</div>';
            }

            ?>


        </div>
    </section>



</section>






<!-- categoria productos seccion  fin-->
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