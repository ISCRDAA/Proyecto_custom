<!DOCTYPE html>

<?php 
include'conexion.php';
$pdo=new Conexion();
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
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
    <h3> Nuestro Catalogo</h3>
    <p> <a href="index.html">Inicio</a>  <span>/Catalogo</span> </p>
</div>

<!-- catalogo seccion inicio-->

<section class="products">
    <h1 class="title">Todos los productos</h1>

    <div class="box-container">
           <!--Sección de carga dinamico de los productos-->
			<?php 

            $data = json_decode( file_get_contents('http://localhost/apicustom/'), true );

            //print_r($data);

            $array = [];
            echo "<br>";
            for($i=0; $i<count($data); $i++) {
                array_push($array,$data[$i]["producto"]."<br>");
            }

            $contador1 = sizeof($array);
            $contador = 0;

			while( $contador <$contador1){
	
			?>
        <form action="carrito.php" method="post" class="box">
            <button type="submit" class="fas fa-eye" name="quick_view"></button>
            <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
            <img src="/Proyecto Cardenas/cargar-imagenes/<?php echo $data [$contador]['imagen'];?>" alt="">
            <a href="#" class="cat"><?php echo $data [$contador]['codigo_barras'];?></a>
            <div class ="name"><?php echo $data[$contador] ['producto'];?></div>
            <div class="flex">
                <div class="price"><span>$</span><?php echo $data [$contador]['precio'];?></span></div>
                <input type="number" name="qty" class="qty" min="1" max="<?php echo $data [$contador]['existencia'];?>" value="1"
                       onkeypress="if (this.value.length ==2)return false;">
            </div>
        </form>
        <?php $contador +=1;}?>

    </div>

</section>

<!-- catalogo seccion fin-->












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

<div class="creditos">creado por <span>Logos de Redes </span></div>









<!-- footer seccion fin-->




<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<!--scripts seccion inicio -->

<script src="/Proyecto Cardenas/js/script.js"></script>

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