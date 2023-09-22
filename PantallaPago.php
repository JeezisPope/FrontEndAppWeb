<?php
require "db.php";
require "cartpage.php";
session_start();


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

    <div class="contenedor contenedor-grid">
        <main class="contenido-principal">
            <article>
                <h1>Payment Method</h1>

                <form class="formulario__data animate__animated animate__zoomIn animate__delay-0.5s no_margin" method="post" novalidate>
                    <fieldset>
                        <legend>
                            <h1 class="legend"></h1>
                        </legend>
                        <!--Intrucciones para el usuario-->
                        <div class="contenedor-campos">
                            <div class="campo">
                                <label>Cardholder</label>
                                <!--mail-->
                                <input class="input-text" type="text" name="cardholder" placeholder="Pedro Picapiedra" required>
                            </div>
                            <div class="campo">
                                <label>Card number</label>
                                <!--mail-->
                                <input class="input-text" type="number" name="cardnumber" required>
                            </div>

                            <div class="campo">
                                <label>CVV</label>
                                <!--texto-->
                                <input class="input-text" type="number" name="cvv" maxlength="3" placeholder="654" required>
                            </div>
                            <div class="campo">
                                <label>Expiration date</label>
                                <!--texto-->
                                <input class="input-text" type="date" name="fecha" min="" required>
                            </div>

                        </div>
                        <div class="alo">
                            <input class="btn w-sm-100" type="submit" name="tarjeta" value="Confirm Credit Card">
                        </div>
                    </fieldset>
                </form>
            </article>
        </main>
        <aside class="sidebar-2 animate__animated animate__zoomIn animate__delay-0.5s">
            <h1>Cart</h1>
            <table>
            <tr>
            <th><h2 class="formulario__campo">Item</h2></th>
            <th><h2 class="formulario__campo">Product Price</h2></th>
            <th><h2 class="formulario__campo">Selected Quantity</h2></th>
            <th><h2 class="formulario__campo">Total</h2></th>
            </tr>
            <?php

                $total = 0;

                $product_id = array_column($_SESSION['cart'], 'product_id');
                
                if(!empty($_SESSION["cart"])){
                    foreach($_SESSION["cart"] as $keys => $values){
                             ?>

                            <tr>
                            <th><h2 class="formulario__campo"><?php echo $values["item_name"]; ?></h2></th>
                            <th><h2 class="formulario__campo">$<?php echo $values["item_price"]; ?></h2></th>
                            <th><h2 class="formulario__campo"><?php echo $values["item_quantity"]; ?></h2></th>
                            <th><h2 class="formulario__campo">$<?php echo number_format($values["item_price"] * $values["item_quantity"], 2); ?></h2></th>
                            <tr>
                            <?php
                            $total = $total + ($values["item_price"] * $values["item_quantity"]);
    
                    }
                    
                }
    ?>
                                </table>
    </div>

    <div class="total animate__animated animate__zoomIn animate__delay-0.5s">
    <?php 
        echo "<h1 class=\"pago_total\">Full payment: $$total</h1>";
        ?>
    </div>
    <div class="separar"></div>
    <footer class="footer animate__animated animate__fadeInUp animate__delay-1s">
        <p class="footer__texto">Front End Store - All Rights Reserved 2022</p>

    </footer>

    <?php
    include("card.php");
    ?>


</body>
</html>