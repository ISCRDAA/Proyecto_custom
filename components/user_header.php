<?php
if (isset($message)) {
    foreach ($message as $message) {
        echo '
        <div class="message">
            <span>' . $message . '</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
        ';
    }
}

?>
<header class="header">
    <section class="flex">

        <a href="index.php" class="logo"><img src="images/logo1.jpg"></a>
        <nav class="navbar">
            <a href="index.php">Inicio</a>
            <a href="productos.php">Productos</a>
            <a href="informacion.html">Informacion</a>
            <a href="nosotros.html">Nosotros</a>
            <a href="ordenes.html">ordenes de compra</a>
        </nav>

        <div class="icons">
            <?php
                $count_user_cart_items = $conn->prepare("SELECT * FROM `carrito` WHERE user_id =?");
                $count_user_cart_items->execute([$user_id]);
               $total_user_cart_items = $count_user_cart_items->rowCount();

            ?>
            <a href="buscar.html"><i class="fas fa-search"> </i> </a>
            <a href="carrito.html"><i class="fas fa-shopping-cart"> </i> <span>(<?= $total_user_cart_items; ?>)</span> </a>
            <div id="user-btn" class="fas fa-user"></div>
            <div id="menu-btn" class="fas fa-bars"></div>
        </div>

        <div class="profile">
            
            <?php
                $select_profile = $conn->prepare("SELECT * FROM `usuarios` WHERE id = ?");
                $select_profile->execute([$user_id]);
                if ($select_profile->rowCount() > 0) {
                    $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);

            ?>
                <p class="name"><?= $fetch_profile['name']; ?></p>
                <div class="flex">
                    <a href="perfil.php" class="btn"> perfil</a>
                    <a href="components/user_logout.php" onclick="return confirm('salir de la pagina?');" class="delete-btn">Salir</a>
                </div>
            <?php
                }
                else {
            ?>
                <p class="name">Inicia sesion primero</p>
                <a href="login.php" class="btn">Inicia sesion</a>
            <?php
             }
            ?>



        </div>

    </section>
</header>