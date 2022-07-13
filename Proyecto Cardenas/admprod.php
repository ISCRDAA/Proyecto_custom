<!DOCTYPE html>

<?php 
include'conexion.php';
$pdo=new Conexion();
?>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<head>
    <meta charset="UTF-8">
    <title>Administrar</title>
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
            <p class="account"> <a href="login.php"> login </a> or <a href="registro.html"> registro</a> </p>

        </div>
    </section>

</header>

<!-- header seccion fin-->

<div class="heading">
    <h3> Registrar Producto</h3>
    <p> <a href="index.php">Inicio</a>  <span>/Registro</span> </p>
</div>


<!--Tabla de productos-->


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
//print("<br> tamaño: $contador");
?>
<div class="container home">    
    <h2>Ejemplo tabla editable con PHP, MySQL y jQuery</h2>      
    <table id="data_table" class="table table-striped">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Estilo</th>
                <th>Tamaño</th>
                <th>Genero</th>   
                <th>Existencia</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Codigo de barras</th>
                <th>Oferta</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            while( $contador <$contador1) {
            ?>
               <tr producto="<?php echo $data [$contador]['producto']; ?>">
               <td><?php echo $data[$contador] ['producto']; ?></td>
               <td><?php echo $data [$contador]['estilo']; ?></td>
               <td><?php echo $data [$contador]['tamano']; ?></td>
               <td><?php echo $data[$contador]['genero']; ?></td>
               <td><?php echo $data [$contador]['existencia']; ?></td>
               <td><?php echo $data [$contador]['imagen']; ?></td>   
               <td><?php echo $data [$contador]['precio']; ?></td>  
               <td><?php echo $data [$contador]['codigo_barras']; ?></td>
               <td><?php echo $data [$contador]['oferta']; ?></td>  
               </tr>
            <?php $contador +=1;} ?>
        </tbody>
    </table>    
</div>




<!-- Registro seccion inicio-->

<section class="form-container">
    <form action="post_prod.php" method="post">
        <h3>Datos del producto</h3>
        <input type="text" name="producto" required placeholder="Ingresa el nombre del Producto"
        class="box" maxlength="50">

        <input type="text" name="estilo" required placeholder="Pequeña descrioción del poroducto"
                class="box" maxlength="50"  >

        <input type="text" name="tamano" required placeholder="Ingrese el tamamaño"
                class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g,'')" >

        <input type="text" name="genero" required placeholder="Genero al que pertenece el producto"
                class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g,'')" >
                
        <input type="text" name="existencia" required placeholder="Numero de piezas en existencia"
                class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g,'')" >
                       

        <input type="text" name="imagen" required placeholder="Ingrese nombre de la imagen"
                class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g,'')" >
        
        <input type="text" name="precio" required placeholder="Ingrese el precio de producto"
                class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g,'')" >

        <input type="text " name="codigo" required placeholder="Ingrese codigo de barras"
                class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g,'')" >   
        
    <input type="text" name="oferta" required placeholder="El producto esta en oferta Si-No"
               class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g,'')" >
       

        <input type="submit" value="Registrar" name="submit" class="btn">
        
    </form>

</section>






<!-- Registro seccion fin-->




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


