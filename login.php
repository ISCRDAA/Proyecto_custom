<?php
include 'components/connect.php';


session_start();
if (isset($_SESSION['id_cliente'])) {
    $id_cliente = $_SESSION['id_cliente'];
} else {
    $id_cliente = '';
}
if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $pass = sha1($_POST['pass']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);


    $select_user = $conn->prepare("SELECT * FROM `usuariosweb` WHERE email = ? OR password = ?");
    $select_user->execute([$email, $pass]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);

    if ($select_user->rowCount() > 0) {
        $_SESSION['id_cliente'] = $row['idcliente'];
        header('location:index.php');
    } else {
        $message[] = 'Incorrecto el email o la contraseña';


    }

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

<!-- login seccion inicio -->
<section class="form-container">


    <form action="" method="POST">
        <h3>Incia sesion</h3>


        <input type="email" name="email" placeholder="Ingresa tu email" maxlength="50"  requiered class="box">

        <input type="password" name="pass" placeholder="Ingresa tu password" maxlength="50"  requiered class="box" oninput="this.value = this.value.replace(/\s/g,'')">



        <input type="submit" value="inicia sesion" name="submit" class="btn">
        <p>¿No tienes cuenta? <a href="registro.php">registrate Ahora</a></p>


    </form>
</section>


<!-- login seccion final -->









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