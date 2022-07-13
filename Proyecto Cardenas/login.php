<!DOCTYPE html>

<?php 
include'conexion.php';
$pdo=new Conexion();
?>
<?php session_start(); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Informacion</title>
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
            <a href="index.php">Inicio</a>
            <a href="productos.php">Productos</a>
            <a href="informacion.html">Informacion</a>
            <a href="nosotros.html">Nosotros</a>
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
    <h3> Inicio de sesion</h3>
    <p> <a href="index.html">Inicio</a>  <span>/Inicio de sesion</span> </p>
</div>

<!-- Login seccion inicio-->

<section class="form-container">

    <form action="validar.php" method="post">
        <h3>Ingresa</h3>
        <input type="text" name="usuar" required placeholder="Ingrese su usuario"
               class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g,'')" >
        <input type="password" name="pass" required placeholder="Ingrese su Contraseña"
               class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g,'')" >

        <input type="submit" value="Ingrese" name="submit" class="btn">
        <p> ¿No tiene una cuenta? <a href="registro.html">Registrate ahora!</a> </p>
    </form>
    
</section>






<!-- Login seccion fin-->




<!-- footer seccion inicio-->

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