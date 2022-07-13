<!DOCTYPE html>

<?php session_start(); 


//aqui empieza el carrito
if(isset($_SESSION['carrito'])|| isset($_SESSION['titulo'])){
    
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Carrito</title>
    <!-- fuente externa cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/Proyecto Cardenas/css/estilo.css">


</head>
<body>
<!-- header seccion comienzo-->

<header class="header">
    <section class="flex">

        <a href="index.html" class="logo"><img src="/Proyecto Cardenas/imagenes/logo1.JPG"></a>
        <nav class="navbar">
            <a href="index.html">Inicio</a>
            <a href="productos.html">Productos</a>
            <a href="informacion.html">Informacion</a>
            <a href="nosotros.html">Nosotros</a>
            <a href="ordenes.html">Ordenes de pago</a>
        </nav>
        <div class="icons">
            <a href="buscar.html"><i class="fas fa-search"> </i> </a>
            <a href="carrito.html"><i class="fas fa-shopping-cart"> </i> <span>(3)</span> </a>
            <div id="user-btn" class="fas fa-user"></div>
            <div id="menu-btn" class="fas fa-bars"></div>
        </div>

        <div class="profile">

            <p class="name"> Inicio de sesion</p>
            <div class="flex">
                <a href="perfil.html" class="btn">perfil</a>
                <a href="#" class="delete-btn"> salir</a>
            </div>
            <p class="account"> <a href="login.html"> login </a> or <a href="registro.html"> registro</a> </p>

        </div>
    </section>

</header>

<!-- header seccion fin-->

<div class="heading">
    <h3> Carrito de compras</h3>
    <p> <a href="index.html">Inicio</a>  <span>/Carrito de compras</span> </p>
</div>

<!-- carrito de compras seccion inicio-->

<section class="products">
    <h1 class="title"> Tu carro </h1>

    <div class="cart-total">
        <p>Total del carrito: <span> $9 </span></p>
        <a href="pago.html" class="btn"> proceder a pagar</a>
    </div>

    <div class="box-container">

        <form action="" method="post" class="box">
            <button type="submit" class="fas fa-eye" name="quick_view"></button>
            <button type="submit" class="fas fa-times" name="delete" onclick="return
            confirm('¿Borrar este item?');"></button>
            <img src="/Proyecto Cardenas/cargar-imagenes/playera.jpeg" alt="">
            <div class ="name">playera mexicana 01</div>
            <div class="flex">
                <div class="price"><span>$</span>350</div>
                <input type="number" name="qty" class="qty" min="1" max="10" value="1"
                       onkeypress="if (this.value.length ==2)return false;">
                <button type="submit" class="fas fa-edit"></button>
            </div>
            <div class="sub-total">sub total : <span>$3 </span></div>
        </form>


        <form action="" method="post" class="box">
            <button type="submit" class="fas fa-eye" name="quick_view"></button>
            <button type="submit" class="fas fa-times" name="delete" onclick="return
            confirm('¿Borrar este item?');"></button>
            <img src="/Proyecto Cardenas/cargar-imagenes/sudadera.jpg" alt="">
            <div class ="name">playera mexicana 01</div>
            <div class="flex">
                <div class="price"><span>$</span>350</div>
                <input type="number" name="qty" class="qty" min="1" max="10" value="1"
                       onkeypress="if (this.value.length ==2)return false;">
                <button type="submit" class="fas fa-edit"></button>
            </div>
            <div class="sub-total">sub total : <span>$3 </span></div>
        </form>

        <form action="" method="post" class="box">
            <button type="submit" class="fas fa-eye" name="quick_view"></button>
            <button type="submit" class="fas fa-times" name="delete" onclick="return
            confirm('¿Borrar este item?');"></button>
            <img src="/Proyecto Cardenas/cargar-imagenes/gorra.jpg" alt="">
            <div class ="name">playera mexicana 01</div>
            <div class="flex">
                <div class="price"><span>$</span>350</div>
                <input type="number" name="qty" class="qty" min="1" max="10" value="1"
                       onkeypress="if (this.value.length ==2)return false;">
                <button type="submit" class="fas fa-edit"></button>
            </div>
            <div class="sub-total">sub total : <span>$3 </span></div>
        </form>
    </div>

    <div class="more-btn">
        <form action="" method="post">
            <button type="submit" class="delete-btn" name="delete_all"
                    onclick="return confirm('¿ Desea borrar todo del carrito ?');">Borrar todo? </button>
        </form>
    </div>

</section>





<!-- carrito de compras seccion fin-->












<footer class="footer">

    <section class="grid">

        <div class="box">
            <img src="/Proyecto Cardenas/imagenes/mail%20(1).svg" alt="">
            <h3> nuestro email</h3>
            <a href="mailto:Angel2gol@hotmail.com">angel2gol@hotmail.com</a>

        </div>

        <div class="box">
            <img src="/Proyecto Cardenas/imagenes/clock%20(1).svg" alt="">
            <h3> Horarios</h3>
            <p>07:00 am  a 10:00 pm</p>

        </div>

        <div class="box">
            <img src="/Proyecto Cardenas/imagenes/map-pin.svg" alt="">
            <h3> nuestra direccion</h3>
            <a href="#">Hidlago, Tulancingo-doria oriente 105</a>

        </div>

        <div class="box">
            <img src="/Proyecto Cardenas/imagenes/smartphone.svg" alt="">
            <h3> nuestro telefono</h3>
            <a href="tel"> Tel: 775-205-0635</a>

        </div>

    </section>



</footer>

<div class="creditos">creado por <span>Ing.Angel Alonso </span></div>









<!-- footer seccion fin-->

<div class="loader">
<img src="/Proyecto Cardenas/imagenes/loader.gif" alt="">
</div>


<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<!--scripts seccion inicio -->

<script src="script.js"></script>

<script>
    var swiper = new Swiper(".hero-slider", {
        loop:true,
        effect: "flip",
        grabCursor: true,
        pagination: {
            el: ".swiper-pagination",
            clickable:true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    })
</script>





<!-- scripts seccion fin-->
</body>
</html>