<?php
include_once('db.php');

if(isset($_POST['env'])){
    if (empty($_POST["street"])) {
        die("<h2>street is required</h2>");
    }
    if (empty($_POST["city"])) {
        die("<h2>city is required</h2>");
    }
    if (empty($_POST["district"])) {
        die("<h2>district is required</h2>");
    }
    if (empty($_POST["numbero"])) {
        die("<h2>number is required</h2>");
    }
    if(strlen($_POST["street"]) > 40){
        die("<h2>Street must be less than 40 characters</h2>");
    }
    if(strlen($_POST["numbero"]) > 4){
        die("<h2>number must be less than 4 characters</h2>");
    }
    if(strlen($_POST["numbero"]) < 3){
        die("<h2>number must be more than 3 characters</h2>");
    }


    $sql = "INSERT INTO envio (street, city, district, numbero)
            VALUES (?,?,?,?)";
    
    $mysqli = require __DIR__ . "/db.php";
    $stmt = $mysqli->stmt_init();

    if(! $stmt->prepare($sql)){
        die("SQL ERROR: " . $mysqli->error);
    }

    $stmt->bind_param("ssss",
                      $_POST["street"],
                      $_POST["city"],
                      $_POST["district"],
                      $_POST["numbero"]);
    
    if($stmt->execute()){
        echo "<script>window.location = 'ResumenCompra.php'</script>";
    }
}

?>