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

    <h1 class="texto_carro">Select shipping location</h1>
    <div class="flex_maps">
        <article>
 

        <form class="formulario__data animate__animated animate__zoomIn animate__delay-0.5s no_margin" method="post" novalidate>
            <fieldset>
                <legend>
                    <h1 class="legend"></h1>
                </legend>
                <!--Intrucciones para el usuario-->
                <div class="contenedor-campos">
                    <div class="campo">
                        <label>Street</label>
                        <!--mail-->
                        <input class="input-text" type="text" name="street" placeholder="Av. Molina" required>
                    </div>
                    <div class="campo">
                    <label>City</label>
                    <select class="formulario__campo" name="city" required>
                    <option class="opcion_select" disabled selected>-- Select City --</option>
                    <option class="opcion_font" value="Lima">Lima</option>
                    </select>
                    </div> 
                    <div class="campo">
                    <label>District</label>
                    <select class="formulario__campo" name="district">
                    <option class="opcion_select" disabled selected>-- Seleccionar District --</option>
                    <option class="opcion_font" value="Surco">Surco</option>
                    <option class="opcion_font" value="La Molina">La Molina</option>
                    <option class="opcion_font" value="Baranco">Barranco</option>
                    <option class="opcion_font" value="San Borja">San Borja</option>
                    <option class="opcion_font" value="Miraflores">Miraflores</option>
                    <option class="opcion_font" value="San Isidro">San Isidro</option>
                    <option class="opcion_font" value="Chorrillos">Chorrillos</option>
                    <option class="opcion_font" value="Surquillo">Surquillo</option>
                    </select>
                    </div> 

                    <div class="campo">
                        <label>Number</label>
                        <!--texto-->
                        <input class="input-text" type="text" name="numbero" placeholder="120">
                    </div>

                </div>
                <div class="alo">
                    <input class="btn w-sm-100" type="submit" name="env" value="Confirm Address">
                </div>
            </fieldset>
        </form>
    </article>
    <article class="mapas123">
        <iframe class="maps" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d62427.46441322061!2d-77.0296179!3d-12.0630149!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2spe!4v1663279840062!5m2!1ses-419!2spe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </article>
    </div>
    
    <div class="separar"></div>
    <footer class="footer animate__animated animate__fadeInUp animate__delay-1s">
        <p class="footer__texto">Front End Store - All Rights Reserved 2022</p>
    </footer>

    <?php
    include("envio.php");
    ?>

</body>

</html>