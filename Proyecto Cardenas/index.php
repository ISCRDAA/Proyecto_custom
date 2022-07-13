<!DOCTYPE html>

<?php 
include'conexion.php';
$pdo=new Conexion();
?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <!-- fuente externa cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" >
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
            <a href="ordenes.html">ordenes de compra</a>
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
            <p class="account"> <a href="login.php"> login </a> or <a href="registro.html"> registro</a> </p>

        </div>
    </section>

</header>

<!-- header seccion fin-->

<!-- hero seccion inicio-->

<section class="hero">

    <div class="swiper hero-slider">
        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <div class="content">
                    <span>Ordena en linea</span>
                    <h3>Gorras</h3>
                    <a href="productos.html" class="btn"> muestra mas productos</a>
                </div>
                <div class="image">
                    <img src="/Proyecto Cardenas/imagenes/gorras.png" alt="">
                </div>
            </div>
            <div class="swiper-slide">
                <div class="content">
                    <span>Ordena en linea</span>
                    <h3>playeras</h3>
                    <a href="productos.html" class="btn"> muestra mas productos</a>
                </div>
                <div class="image">
                    <img src="/Proyecto Cardenas/imagenes/playera.jpg" alt="">
                </div>
            </div>

            <div class="swiper-slide">
                <div class="content">
                    <span>Ordena en linea</span>
                    <h3>Tazas</h3>
                    <a href="productos.html" class="btn"> muestra  mas productos</a>
                </div>
                <div class="image">
                    <img src="/Proyecto Cardenas/imagenes/taza.jpg" alt="">
                </div>
            </div>
            <div class="swiper-slide">
                <div class="content">
                    <span>Ordena en linea</span>
                    <h3>Tarros</h3>
                    <a href="productos.html" class="btn"> muestra  mas productos</a>
                </div>
                <div class="image">
                    <img src="/Proyecto Cardenas/imagenes/tarro.jpg" alt="">
                </div>
            </div>
        </div>

    </div>
    <div class="swiper-pagination"></div>

</section>



<!-- hero seccion fin-->

<!-- category seccion incio-->

<section class="category">
    <h1 class="title"> Categorias de productos</h1>
    <div class="box-container">
        <a href="#" class="box">
            <img src="/Proyecto Cardenas/imagenes/sublimados.jpg" alt="">
            <h3>sublimados</h3>
        </a>

        <a href="#" class="box">
            <img src="/Proyecto Cardenas/imagenes/estampado2.jpg" alt="">
            <h3>estampados</h3>
        </a>
    </div>
</section>





<!-- category seccion fin-->

<!-- home products seccion inicio-->

<section class="products">
    <h1 class="title">Productos en oferta</h1>
    <div class="box-container">

    <!--Sección de carga dinamico de los productos-->
			<?php 
			$sql=$pdo->prepare("SELECT * FROM `productos` WHERE oferta ='Si'");
			//$sql ->bindValue (':id', $_GET['id']);
			$sql->execute();
			$sql->setFetchMode(PDO::FETCH_ASSOC);
			//header( "HTTPS/1.1 200 OK");
			//echo json_encode($sql->fetchAll());
			$res = $sql->fetchAll();

			foreach ($res as $fila ){
	
			?>
        <form action="" method="post" class="box">
            <button type="submit" class="fas fa-eye" name="quick_view"></button>
            <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
            <img src="/Proyecto Cardenas/cargar-imagenes/<?php echo $fila['imagen'];?>" alt="">
            <a href="#" class="cat"><?php echo $fila['codigo_barras'];?></a>
            <div class ="name"><?php echo $fila['producto'];?></div>
            <div class="flex">
                <div class="price"><span>$</span><?php echo $fila['precio'];?></div>
                <input type="number" name="qty" class="qty" min="1" max="10" value="1"
                       onkeypress="if (this.value.length ==2)return false;">
            </div>
        </form>
        <?php }?>

    </div>
    <div class="more-btn">
        <a href="productos.html" class="btn">Ver todo</a>
    </div>
</section>




<!-- home products seccion fin-->












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

<div class="creditos">creado por <span>Ing.Angel Alonso </span>
</div>









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


