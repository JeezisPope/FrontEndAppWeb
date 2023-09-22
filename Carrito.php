<?php
require "db.php";
require "ccartt.php";
session_start();

if(isset($_GET['action'])){
        foreach($_SESSION['cart'] as $key => $value){
            if($value["item_id"] == $_GET['id']){
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product has been removed')</script>";
                echo "<script>window.location = 'Carrito.php'</script>";
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
    <title>FrontEnd Store</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@300&family=Bungee+Hairline&family=Courier+Prime&family=Krub:wght@400;700&family=PT+Sans+Narrow&family=Raleway:wght@100&family=Roboto+Condensed&family=Staatliches&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="icon" href="img/f.png">
    <script src="js/showP.js"></script>
</head>
<body>
    <header class="header animate__animated animate__slideInDown animate__delay-0.5s">
        <a href="index_session.php">
            <img class="header__logo" src="img/f2.png" alt="Logotipo">
        </a>
    </header>
    <nav class="navegacion">
        <h1 class="texto_carro">Products added to cart</h1>
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <circle cx="6" cy="19" r="2" />
            <circle cx="17" cy="19" r="2" />
            <path d="M17 17h-11v-14h-2" />
            <path d="M6 5l14 1l-1 7h-13" />
          </svg>
    </nav>
    <div class="separar"></div> 
    <main class="contenedor_carrito dos_columnas_hola animate__animated animate__fadeInUp animate__delay-0.5s">           <!-- Inicio Bloque Producto-->
        <?php
        $total = 0;
        $product_id = array_column($_SESSION['cart'], 'item_id');
        ?>
        <table>
        <tr>
            <th><h2>Item</h2></th>
            <th><h2>Product Price</h2></th>
            <th><h2>Selected Quantity</h2></th>
            <th><h2>Total</h2></th>
        </tr>
        <?php
            if(!empty($_SESSION["cart"])){
                foreach($_SESSION["cart"] as $keys => $values){
                         ?>
                        <tr>
                        <th><h2 class="texto_carro"><?php echo $values["item_name"]; ?></h2></th>
                        <th><h2 class="texto_carro">$<?php echo $values["item_price"]; ?></h2></th>
                        <th><h2 class="texto_carro"><?php echo $values["item_quantity"]; ?></h2></th>
                        <th><h2 class="texto_carro">$<?php echo number_format($values["item_price"] * $values["item_quantity"], 2); ?></h2></th>
                        <th><a href="Carrito.php?action=delete&id=<?php  echo $values["item_id"]?>" class="btn">Remove</a></th>
                        </tr>
                        <?php
                        $total = $total + ($values["item_price"] * $values["item_quantity"]);

                }
            }
?>


        </table>

        <div class="price_d animate__animated animate__fadeInUp animate__delay-0.5s">
            <?php
            if(isset($_SESSION['cart'])){
                $count = count($_SESSION['cart']);

            }else{
                echo "<h3>Price(0 items)</h3>";
            }
        ?>
        <h1>Shopping Cart Details</h1>
         <?php 
         echo "<h2>Total Price:  $$total</h2>";
        ?>
        </div>  

    </main>
    <div class="flex_carrito animate__animated animate__fadeInUp animate__delay-1s">
        <a class="btn_carro" href="index_session.php"><h2 class="texto_carro">Keep Buying</h2></a>
        <a class="btn_carro" href="PantallaPago.php"><h2 class="texto_carro">Buy Now</h2></a>
    </div>
    
    <div class="separar"></div>
    <footer class="footer animate__animated animate__fadeInUp animate__delay-1s">
        <p class="footer__texto">Front End Store - All Rights Reserved 2022</p>

    </footer>

</body>

</html>