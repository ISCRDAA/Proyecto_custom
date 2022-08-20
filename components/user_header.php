<?php
if (isset($message)) {
    foreach ($message as $message) {
        echo '
        <div class="men">
            <span>' .$message. '</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
        ';
    }
}

?>
<header class="header">
    <section class="flex">

        <a href="index.php" class="logo"><img src="images/logo custom.jpeg"></a>
        <nav class="navbar">
           <a href="index.php"><img src="images/home.png" alt="">Inicio</a>
            <a href="contactanos.php"><img src="images/informacion.png" alt="">Informacion</a>
            <a href="nosotros.php">Nosotros</a>
            <a href="ordenes.php"><img src="images/ordenes.png" alt="">ordenes de compra</a>
        </nav>

        <div class="icons">
            <?php
            $count_user_cart_items = $conn->prepare("SELECT * FROM `carrito` WHERE pid= ?");
            $count_user_cart_items->execute([$id_cliente]);
            $total_user_cart_items = $count_user_cart_items->rowCount();

            ?>
            <a href="buscar.php"><i class="fas fa-search"> </i> </a>
            <a href="carrito.php"><i class="fas fa-shopping-cart"> </i> <span>(<?= $total_user_cart_items; ?>)</span> </a>
            <div id="user-btn" class="fas fa-user"></div>
            <div id="menu-btn" class="fas fa-bars"></div>


        </div>

        <div class="profile">
            <?php
                $select_profile = $conn->prepare("SELECT * FROM `usuariosweb` WHERE idcliente = ?");
                $select_profile->execute([$id_cliente]);
             if ($select_profile->rowCount() > 0) {
                    $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);


            ?>
                <p class="name"><?= $fetch_profile['nombre']; ?></p>
                <div class="flex">
                    <a href="perfil.php" class="btn"> perfil</a>
                    <a href="components/user_logout.php" onclick="return confirm('salir de la pagina?');" class="delete-btn">Salir</a>
                </div>
                 <p class="account"><a href="registro.php">Registro  / <a href="login.php">Login</a></a></p>
            <?php
            }
            else {
            ?>
                <img src="images/key.png" alt="" class="logo"><p class="name" > inicia sesion primero</p>
                <a href="login.php" class="btn">Inicia sesion</a>
            <?php
            }
            ?>
        </div>

    </section>
</header>