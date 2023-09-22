<?php
require "db.php";
require_once "component1.php";
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
    <script src="js/showP.js"></script>
</head>

<body>
    <header class="header animate__animated animate__slideInDown animate__delay-0.5s">
        <section>
            <a href="index.php">
                <img class="header__logo" src="img/f2.png" alt="Logotipo">
            </a>
        </section>
    </header>

    <nav class="navegacion animate__animated animate__fadeIn animate__delay-0.5s">
        <a class="navegacion__enlace navegacion__enlace--activo" href="index.php">Shop</a>
        <a class="navegacion__enlace" href="Nosotros.php">Us</a>
    </nav>

    <div class="buttons_log animate__animated animate__fadeInUp animate__delay-0.5s">
        <a class="link" href="Sign_Up.php">
            <h1 class="link_font">Sign Up</h1>
        </a>

        <a class="link" href="Sign_In.php">
            <h1 class="link_font">Log In</h1>
        </a>
    </div>
    <div class="icono_carrito animate__animated animate__fadeInUp animate__delay-0.8s">
        <a href="Sign_Up.php">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <circle cx="6" cy="19" r="2" />
                <circle cx="17" cy="19" r="2" />
                <path d="M17 17h-11v-14h-2" />
                <path d="M6 5l14 1l-1 7h-13" />
              </svg>
        </a>

    </div>

    <main class="contenedor animate__animated animate__fadeInUp animate__delay-0.5s">
        <h1>Our Products</h1>
        <div class="grid">
            <?php
            $sql = "SELECT * FROM products";
            
            $result = $mysqli->query($sql);
    
            while($row = mysqli_fetch_assoc($result)){
                component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
            }
            ?>
        </div>
    </main>
    <div class="separar"></div>
    <footer class="footer animate__animated animate__fadeInUp animate__delay-1s">
        <p class="footer__texto">Front End Store - All Rights Reserved 2022</p>
    </footer>

</body>

</html>