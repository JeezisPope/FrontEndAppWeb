<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@300&family=Bungee+Hairline&family=Courier+Prime&family=Krub:wght@400;700&family=PT+Sans+Narrow&family=Raleway:wght@100&family=Roboto+Condensed&family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="icon" href="img/f.png">
</head>
<body>
  <header class="header animate__animated animate__slideInDown animate__delay-0.5s">
    <section>
        <a href="index.php">
            <img class="header__logo" src="img/f2.png" alt="Logotipo">
        </a>
    </section>
</header>

    <form class="formulario__data animate__animated animate__zoomIn animate__delay-0.5s" method="post" novalidate>
        <fieldset>
            <legend><h1 class="legend">Create Account</h1></legend><!--Intrucciones para el usuario-->
        <div class="contenedor-campos">
            <div class="campo">
            <label>Name</label><!--texto-->
            <input class="input-text" type="text" name="nombre" placeholder="Your Name"><!--Cuadro de Texto, hay varios tipos de label-->
            </div>

            <div class="campo">
                <label>Last Name</label><!--texto-->
                <input class="input-text" type="text" name="apellido" placeholder="Your Last Name" required><!--Cuadro de Texto, hay varios tipos de label-->
                </div>

            <div class="campo">
            <label>Phone Number</label>
            <input class="input-text" type="number" name="telefono" placeholder="Phone Number" required>
            </div>

            <div class="campo">
            <label>E-mail</label><!--mail-->
            <input class="input-text" type="email" name="correo" id="correo" placeholder="Pedro25@gmail.com" required>
            </div>

            <div class="campo">
                <label>Password</label><!--texto-->
                <input class="input-text dataform" type="password" name="clave" id="clave"placeholder="Password" required>
            </div>

          </div>
          <div class="alo">
            <input class="btn w-sm-100" type="submit" name="res" value="Sign up">
          </div>

          <div class="alo">
            <a class="btn w-sm-100" href="index.php">Back Home</a>
          </div>
          <h3><a class="link_already" href="Sign_In.php">Already an Account?</a></h3>
        </fieldset>
    </form>
    <?php
    include("register.php");
    ?>
    
</body>
</html>