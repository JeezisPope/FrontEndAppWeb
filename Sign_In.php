<?php
$is_invalid = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $mysqli = require __DIR__ . "/db.php";

  $sql = sprintf("SELECT * FROM usuarios
          WHERE email = '%s' ",
          $mysqli->real_escape_string($_POST["correo"]));

  $result = $mysqli->query($sql);

  $user = $result->fetch_assoc();


  if($user){
    if(password_verify($_POST["clave"], $user["clave_hash"])){

      session_start();

      session_regenerate_id();

      $_SESSION["usuarios_id"] = $user["id"];

      header("Location: index_session.php");
      exit;
    //  die("Login succesful");
    }
  }

  $is_invalid = true;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-in</title>
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

    <form class="formulario__data animate__animated animate__zoomIn animate__delay-0.5s" method="post" novalidate>
        <fieldset>
            <legend><h1 class="legend">Sign In</h1></legend><!--Intrucciones para el usuario-->
            <div class="contenedor-campos">
            <div class="campo">
            <label>E-mail</label><!--mail-->
            <input class="input-text" type="email" name="correo" id="correo" placeholder="pedro@gmail.com">
            </div>

            <div class="campo">
              <label>Password</label><!--texto-->
              <input class="input-text" type="password" id="clave" name="clave" placeholder="Password">
          </div>

          </div>
          <div class="alo">
            <input class="btn w-sm-100" type="submit" value="Sign In">
          </div>

          <div class="alo">
            <a class="btn w-sm-100" href="index.php">Back Home</a>
          </div>
        </fieldset>
    </form>

    <?php if($is_invalid): ?>
      <h2>Invalid Login</h2>
    <?php endif;?>

    
    
</body>
</html>