<?php
include_once('db.php');

if(isset($_POST['tarjeta'])){
    if (empty($_POST["cardholder"])) {
        die("<h2>Cardholder is required</h2>");
    }

    $permitidos = "abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ";
    for ($i=0; $i<strlen($_POST["tarjeta"]); $i++){
       if (strpos($permitidos, substr($_POST["tarjeta"],$i,1))===false){
        die("<h2>Cardholder must be valid</h2>");
       }
    }

    if (empty($_POST["cardnumber"])) {
        die("<h2>Cardnumber is required</h2>");
    }
    if (empty($_POST["cvv"])) {
        die("<h2>CVV is required</h2>");
    }
    if (empty($_POST["fecha"])) {
        die("<h2>Date is required</h2>");
    }
    if (strlen($_POST["cardholder"]) > 40) {
        die("<h2>Cardholder must be valid</h2>");
    }
    if ($_POST["cardnumber"] < 1000000000000000 || $_POST["cardnumber"] > 8999999999999999) {
        die("<h2>CardNumber must be valid</h2>");
    }
    if ($_POST["cvv"] < 100 || $_POST["cvv"] > 9999) {
        die("<h2>CVV must be valid</h2>");
    }

    $sql = "INSERT INTO metodopago (cardholder, cardnumber, cvv, fecha)
            VALUES (?,?,?,?)";
    
    $mysqli = require __DIR__ . "/db.php";
    $stmt = $mysqli->stmt_init();

    if(! $stmt->prepare($sql)){
        die("SQL ERROR: " . $mysqli->error);
    }

    $stmt->bind_param("ssss",
                      $_POST["cardholder"],
                      $_POST["cardnumber"],
                      $_POST["cvv"],
                      $_POST["fecha"]);

    if($stmt->execute()){
        echo "<script>window.location = 'PantallaEnvio.php'</script>";
    }
}
?>