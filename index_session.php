<?php
require "db.php";
require_once "component.php";

session_start();

isset($_SESSION["usuarios_id"]);
$sql = "SELECT nombre, apellido, email FROM usuarios WHERE id = {$_SESSION['usuarios_id']}";
$resultado = $mysqli->query($sql);
$fila = $resultado->fetch_assoc();
   
if(isset($_POST['addto'])){
    //   print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){
         $item_array_id = array_column($_SESSION['cart'], 'item_id');

        if(in_array($_GET["id"], $item_array_id)){
            echo "<script>alert('Product is already added in the cart!')</script>";
            echo "<script>window.location='index_session.php'</script>";
        }else{
            $count = count($_SESSION['cart']);
            $item_array = array(
                'item_id'   => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'item_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"]
            );
            $_SESSION['cart'][$count] = $item_array;
        }
    }else{
        $item_array = array(
            'item_id'   => $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'item_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"]
        );
   
       $_SESSION['cart'][0] = $item_array;
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

    <div class="flex_carrito1 animate__animated animate__fadeInUp animate__delay-0.5s">
        <a href="account.php"><h2 class="texto_carro">Hi! <?= htmlspecialchars($fila['nombre'])?></h2></a>
        <a class="btn_cerrar" href="logout.php"><h2 class="texto_carro">Log Out</h2></a>
    </div>

    <div class="icono_carrito animate__animated animate__fadeInUp animate__delay-0.8s">
        <a href="Carrito.php">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <circle cx="6" cy="19" r="2" />
                <circle cx="17" cy="19" r="2" />
                <path d="M17 17h-11v-14h-2" />
                <path d="M6 5l14 1l-1 7h-13" />
            </svg>
        </a>
        <h2>
        <?php
        if(isset($_SESSION['cart'])){
            $count = count($_SESSION['cart']);
            echo "$count";
        }else{
            echo "0";
        }
        ?>
        </h2>
    </div>
    <main class="contenedor animate__animated animate__fadeInUp animate__delay-0.5s">
        <h1>Our Products</h1>
        <div class="grid">
            <?php
                $sql = "SELECT * FROM products ORDER BY id ASC";
                $result = $mysqli->query($sql);
                
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <form method="post" action="index_session.php?action&=add&id=<?php echo $row["id"]; ?>">
                    <div class="producto">
                    <div class="imagee">
                    <img src="<?php echo $row['product_image'];?>" name="image" alt="Image1" class="producto__nombre">
                    </div>
                    <div class="producto__informacion">
                    <p class="producto__nombre"><?php echo $row['product_name'];?></p>
                    <p class="producto__precio">$<?php echo $row['product_price'];?></p>
                    <h3 class="texto_carro">Set Quantity - Default: 1 -</h3>
                    </div>
                    
                    <select class="formulario__campo w-sm-100\" name="quantity">
                    <option class="opcion_font" value=1>1</option>
                    <option class="opcion_font" value=2>2</option>
                    <option class="opcion_font" value=3>3</option>
                    <option class="opcion_font" value=4>4</option>
                    <option class="opcion_font" value=5>5</option>
                    <option class="opcion_font" value=6>6</option>
                    <option class="opcion_font" value=7>7</option>
                    <option class="opcion_font" value=8>8</option>
                    <option class="opcion_font" value=9>9</option>
                    <option class="opcion_font" value=10>10</option>
                    <input type="hidden" name="hidden_name" value="<?php echo $row['product_name'];?>">
                    <input type="hidden" name="hidden_price" value="<?php echo $row['product_price'];?>">
                    <button class="btn w-sm-100" type="submit" name="addto">Add to Cart</button>
                    </div>
                    </form>
                    <?php
                    }
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