<?php
require "db.php";
session_start();


if(isset($_POST['update_data'])){
    isset($_SESSION["usuarios_id"]);
    $sql = "SELECT nombre, apellido, email FROM usuarios WHERE id = {$_SESSION['usuarios_id']}";
    $resultado = $mysqli->query($sql);
    $fila = $resultado->fetch_assoc();

    $permitidos = "abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ";
    for ($i=0; $i<strlen($_POST["nombre"]); $i++){
       if (strpos($permitidos, substr($_POST["nombre"],$i,1))===false){
        die("<h2>Name must be valid</h2>");
       }
    }
    for ($i=0; $i<strlen($_POST["apellido"]); $i++){
        if (strpos($permitidos, substr($_POST["apellido"],$i,1))===false){
         die("<h2>LastName must be valid</h2>");
        }
    }
    if (empty($_POST["nombre"])) {
        die("<h2>Name is required</h2>");
    }
    if (empty($_POST["apellido"])) {
        
        die("<h2>LastName is required</h2>");
    }
    if (empty($_POST["telefono"])) {
        
        die("<h2>PhoneNumber is required</h2>");
    }
    if (strlen($_POST["nombre"]) > 15) {
        die("<h2>Name must be at least 15 characters</h2>");
    }
    if (strlen($_POST["apellido"]) > 15) {
        die("<h2>Last Name must be less than 15 characters</h2>");
    }
    if (strlen($_POST["telefono"]) < 9 || strlen($_POST["telefono"]) > 9) {
        die("<h2>PhoneNumber must be valid</h2>");
    }
    if ($_POST["telefono"] < 900000000 || $_POST["telefono"] > 1000000000) {
        die("<h2>PhoneNumber must be valid</h2>");
    }

    $name = $_POST['nombre'];
    $lastn = $_POST['apellido'];
    $tele = $_POST['telefono'];

    $deleteando = "UPDATE usuarios SET nombre='$name', apellido='$lastn', telefono='$tele' WHERE id = {$_SESSION['usuarios_id']}";
    $perro = $mysqli->query($deleteando);

    if($perro){
        echo "<script>alert('Data Updated Succesfully')</script>";
        echo "<script>window.location = 'account.php'</script>";
    }else{
        echo "<script>alert('Something Went Wrong')</script>";
        echo "<script>window.location = 'account.php'</script>";
    }

}


?>