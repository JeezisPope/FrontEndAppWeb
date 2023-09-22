<?php
require "db.php";

session_start();


$sql = "SELECT id, nombre, apellido, email, telefono FROM usuarios WHERE id = {$_SESSION['usuarios_id']}";
$resultado = $mysqli->query($sql);
$fila = $resultado->fetch_assoc();

if(isset($_POST['deletea'])){
    $user_id = $_POST['deletea'];

    $quer = "DELETE FROM usuarios WHERE id = {$_SESSION['usuarios_id']}";
    $per = $mysqli->query($quer);

    if($per){

        header('Location: index.php');
        exit(0);
    }else{
        $_SESSION['message'] = "Something Went Wrong";
        header('Location: index.php');
        exit(0);
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FrontEnd Store</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@300&family=Bungee+Hairline&family=Courier+Prime&family=Krub:wght@400;700&family=PT+Sans+Narrow&family=Raleway:wght@100&family=Roboto+Condensed&family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="icon" href="img/f.png">
</head>

<body>
    <header class="header animate__animated animate__slideInDown animate__delay-0.5s">
        <section>
            <a href="index_session.php">
                <img class="header__logo" src="img/f2.png" alt="Logotipo">
            </a>
        </section>
    </header>

    <nav class="navegacion animate__animated animate__fadeIn animate__delay-0.5s">
        <a class="navegacion__enlace navegacion__enlace--activo" href="index_session.php">Shop</a>
        <a class="navegacion__enlace" href="Nosotros_success.php">Us</a>
    </nav>
    <main>
        <h1 class="texto_carro">Info Account</h2>

        <div class="dos_columnas animate__animated animate__fadeInUp animate__delay-0.5s">

        <h2 class="texto_carro">Name:   </h3>
        <h2 class="texto_carro"><?= htmlspecialchars($fila['nombre'])?></h3>

        <h2 class="texto_carro">apellido:   </h3>
        <h2 class="texto_carro"><?= htmlspecialchars($fila['apellido'])?></h3>

        <h2 class="texto_carro">telefono:   </h3>
        <h2 class="texto_carro"><?= htmlspecialchars($fila['telefono'])?></h3>

        <h2 class="texto_carro">email:   </h3>
        <h2 class="texto_carro"><?= htmlspecialchars($fila['email'])?></h3>
        </div>

        <div class="separar"></div>

        <div class="grid animate__animated animate__fadeInUp animate__delay-0.5s">

            <form method="post">
            <button type="submit" class="btn_cerrar w-sm-100" name="deletea" value="<?= $fila['id'];?>"><h2 class="texto_carro">Delete Account</h2></button>
            </form> 
            <a class="btn_cerrar" href="edit.php"><h2 class="texto_carro">Edit Account</h2></a>

            <a class="btn_cerrar" href="index_session.php"><h2 class="texto_carro">Back Home</h2></a>
            </div>
            <div class="separar"></div>

            <div class="separar"></div>

    </main>
    <div class="separar"></div>
    <footer class="footer animate__animated animate__fadeInUp animate__delay-1s">
        <p class="footer__texto">Front End Store - All Rights Reserved 2022</p>
    </footer>

</body>

</html>