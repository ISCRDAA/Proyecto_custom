<?php
include 'components/connect.php';


session_start();
if (isset($_SESSION['id_cliente'])) {
    $id_cliente = $_SESSION['id_cliente'];
} else {
    $id_cliente = '';
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
            <a href="categoria.php?category=Unisex" class="box">
                <img src="images/Unisex.png" alt="">
                <h3>Unisex</h3>
            </a>

            <a href="categoria.php?category=hombre" class="box">
                <img src="images/,asculino.jpg" alt="">
                <h3>Hombre</h3>
            </a>

            <a href="categoria.php?category=mujer" class="box">
                <img src="images/femeninio.jpg" alt="">
                <h3>Mujer</h3>
            </a>

            <a href="categoria.php?category=taza" class="box">
                <img src="images/Tarro3.jpg" alt="">
                <h3>Tazas / Tarros</h3>
            </a>


        </div>
    </section>
    <!--  seccion de categoria  de home fin -->


    <!-- home productos seccion  inicio-->


    <section class="products">
        <h1 class="title"> productos </h1>

        <div class="box-container">
            <?php
                $select_products = $conn->prepare("SELECT * FROM `articulos` LIMIT 4");
                $select_products->execute();
                if ($select_products->rowCount() > 0)  {
                    while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
            ?>
            <form action="" method="POST" class="box">
                <input type="hidden" name="pid" value="<?= $fetch_products['id_producto']; ?>">
                <input type="hidden" name="producto" value="<?= $fetch_products['nombre']; ?>">
                <input type="hidden" name="precio" value="<?= $fetch_products['precio']; ?>">
                <input type="hidden" name="imagen" value="<?= $fetch_products['imagen']; ?>">
                <a href="vista rapida.php?pid=<?= $fetch_products['nombre']; ?>" class="fas fa-eye"></a>
                <button type="submit" name="add_to_cart" class="fas fa-shopping-cart"></button>
                <img src="uploaded_img/<?= $fetch_products['imagen']; ?>" class="image" alt="">
                 <a href="categoria.php?category=<?= $fetch_products['genero'];?>" class="cate"><?= $fetch_products['genero']; ?> </a>
                
                <div class="name"><?= $fetch_products['descripcion']; ?></div>
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


    <!-- home productos seccion  fin-->



















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