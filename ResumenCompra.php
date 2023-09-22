<?php
require "db.php";
require "cartpage.php";
$sql_envio = "SELECT street, city, district, numbero FROM envio WHERE id = (SELECT max(id) FROM envio)";
$res = $mysqli->query($sql_envio);

$fila_env = $res->fetch_assoc();
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
</head>

<body>
    <header class="header animate__animated animate__slideInDown animate__delay-0.5s">
        <a href="index_session.php">
            <img class="header__logo" src="img/f2.png" alt="Logotipo">
        </a>
    </header>
    
    <main class="contenedor_resumen animate__animated animate__fadeInUpBig animate__delay-1s">
        <h1 class="texto_resumen">Thanks for Buying</h1>

        <div class="resumencomprapdf">
            <a class="link_pdf texto_carro" href="pdf.php"><img src="img/exportpdf.png" alt="hola">Export to PDF</a>
        </div>

        <div class="separar"></div>
        
        <div class="resumen_compras">
            <aside class="sidebar-2">
                <h1 class="texto_carro">Selected Address</h1>
    
                <div class="producto_envio1">
                    <article>
                        <h2 class="Info_Title">Street</h2>
                        <h2 class="Info_envio"><?= htmlspecialchars($fila_env['street']) ?></h2>
                    </article>
                    <article>
                        <h2 class="Info_Title">City</h2>
                        <h2 class="Info_envio"><?= htmlspecialchars($fila_env['city']) ?></h2>
                    </article>
                    <article>
                        <h2 class="Info_Title">District</h2>
                        <h2 class="Info_envio"><?= htmlspecialchars($fila_env['district']) ?></h2>
                    </article>
                    <article>
                        <h2 class="Info_eTitle">Number</h2>
                        <h2 class="Info_envio"><?= htmlspecialchars($fila_env['numbero']) ?></h2>
                    </article>
                </div>
            </aside>


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
    </main>
    <div class="total animate__animated animate__fadeInUpBig animate__delay-1s">
    <?php 
        echo "<h1 class=\"pago_total\">Full payment: $$total</h1>";
        ?>
    </div>

    <div class="separar"></div>
    <footer class="footer animate__animated animate__fadeInUp animate__delay-1s">
        <p class="footer__texto">Front End Store - Todos los derechos Reservados 2022</p>

    </footer>

</body>

</html>