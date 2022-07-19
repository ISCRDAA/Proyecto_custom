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


    <!-- seccion de home inicio -->

    <section class="hero">
        <div class=" swiper hero-slider">
            <div class="swiper-wrapper">

                <div class="swiper-slide">

                    <div class="content">
                        <span> Ordena en linea</span>
                        <h3>Playeras</h3>
                        <a href="menu.php" class="btn">muestra mas</a>

                    </div>
                    <div class="image">
                        <img src="images/playera.jpg" alt="">
                    </div>

                </div>
                <div class="swiper-slide">

                    <div class="content">
                        <span> Ordena en linea</span>
                        <h3>Gorras</h3>
                        <a href="menu.php" class="btn">muestra mas</a>

                    </div>
                    <div class="image">
                        <img src="images/gorras.png" alt="">
                    </div>

                </div>
                <div class="swiper-slide">

                    <div class="content">
                        <span> Ordena en linea</span>
                        <h3>Tarro</h3>
                        <a href="menu.php" class="btn">muestra mas</a>

                    </div>
                    <div class="image">
                        <img src="images/tarro2.jpg" alt="">
                    </div>
                </div>

            </div>
        </div>

    </section>
    <!-- seccion de home fin -->




    <!--  seccion de categoria  de home inicio -->

    <section class="home-category">
        <h1 class="title">Categorias</h1>
        <div class="box-container">
            <a href="categoria.php?categoria=estampado" class="box">
                <img src="images/estampado2.jpg" alt="">
                <h3>Estampado</h3>
            </a>

            <a href="categoria.php?categoria=sublimado" class="box">
                <img src="images/sublimados.jpg" alt="">
                <h3>Sublimados</h3>
            </a>


        </div>
    </section>
    <!--  seccion de categoria  de home fin -->


    <!-- home productos seccion  inicio-->


    <section class="products">
        <h1 class="title"> productos en oferta </h1>

        <div class="box-container">
            <?php 
                $select_products = $conn->prepare("SELECT * FROM `productos` LIMIT 6");
                $select_products->execute();
                if ($select_products->rowCount() > 0)  {
                    while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
            ?>
            <form action="" method="POST" class="box">
                <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
                <input type="hidden" name="name" value="<?= $fetch_products['id']; ?>">
            </form>

            <?php
                    }
                }else {
                    # code...
                }
            ?>


        </div>
    </section>


    <!-- home productos seccion  fin-->





















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