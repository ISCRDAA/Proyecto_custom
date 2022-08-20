<?php
include 'components/connect.php';


session_start();
if (isset($_SESSION['id_cliente'])) {
    $id_cliente = $_SESSION['id_cliente'];
} else {
    $id_cliente = '';
}

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $apellido = $_POST['apellido'];
    $apellido = filter_var($apellido, FILTER_SANITIZE_STRING);
    $direccion = $_POST['direccion'];
    $direccion = filter_var($direccion, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $pass = sha1($_POST['pass']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);
    $cpass = sha1( $_POST['cpass']);
    $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);
    $telefono = $_POST['telefono'];
    $telefono = filter_var($telefono, FILTER_SANITIZE_STRING);
    $rfc = $_POST['rfc'];
    $rfc = filter_var($rfc, FILTER_SANITIZE_STRING);

    $select_user = $conn->prepare("SELECT * FROM `usuariosweb` WHERE email = ? OR telefono = ?");
    $select_user->execute([$email, $telefono]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);

    if ($select_user->rowCount() > 0) {
        $message[] = 'El email o el numero ya esta registrado';
    } else {
        if ($pass != $cpass) {
            $message[] = 'Confirma tu password, no coinciden';

        } else {
            $insert_user = $conn->prepare("INSERT INTO `usuariosweb`(nombre,apellido,direccion,email,password,telefono,rfc) VALUES(?,?,?,?,?,?,?)");
            $insert_user->execute([$name, $apellido, $direccion, $email, $pass, $telefono, $rfc]);
            $confirm_user = $conn->prepare("SELECT * FROM `usuariosweb` WHERE email = ? AND password = ?");
            $confirm_user->execute([$email, $cpass]);
            $row = $confirm_user->fetch(PDO::FETCH_ASSOC);
            if ($confirm_user->rowCount() > 0){
                $_SESSION['id_cliente'] = $row['idcliente'];
                header('location:index.php');

            }


        }

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


<! -- seccion de registro inicio -->
<section class="form-container">


    <form action="" method="POST">
        <h3>Registrate</h3>
        <input type="text" name="name" placeholder="Ingresa tu nombre" maxlength="50"  requiered class="box">

        <input type="text" name="apellido" placeholder="Ingresa tu apellido" maxlength="50"  requiered class="box">

        <input type="text" name="direccion" placeholder="Ingresa tu direccion" maxlength="50"  requiered class="box">

        <input type="email" name="email" placeholder="Ingresa tu email" maxlength="50"  requiered class="box">

        <input type="password" name="pass" placeholder="Ingresa tu password" maxlength="50"  requiered class="box" oninput="this.value = this.value.replace(/\s/g,'')">

        <input type="password" name="cpass" placeholder="Confirma tu password" maxlength="50"  requiered class="box" oninput="this.value = this.value.replace(/\s/g,'')">

        <input type="number" name="telefono" placeholder="Ingresa tu numero de telefono" max="9999999" min="0" maxlength="12 "requiered class="box">

        <input type="text" name="rfc" placeholder="Ingresa tu rfc" max="9999999" min="0" maxlength="10 "requiered class="box">


        <input type="submit" value="Registrate ahora" name="submit" class="btn">
         <p>¿Ya tienes cuenta? <a href="login.php">Ingresa ahora</a></p>


    </form>
</section>

<! -- seccion de registro fin -->








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