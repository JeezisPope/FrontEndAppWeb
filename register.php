<?php
include_once('db.php');
//Recibo los datos del form

if(isset($_POST['res'])){


    $email = ($_POST["correo"]);

    $quer = "SELECT email FROM usuarios WHERE email = '$email' ";

    $respuesta = $mysqli->query($quer);

    if(mysqli_num_rows($respuesta)>0){
        die("<script>alert('Email Already Taken')</script><script>window.location = 'Sign_Up.php'</script>");
    }


    /**/
    
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

    /**/
    if (empty($_POST["nombre"])) {
        die("<h2>Name is required</h2>");
    }
    if (empty($_POST["apellido"])) {
        
        die("<h2>LastName is required</h2>");
    }
    if (empty($_POST["telefono"])) {
        
        die("<h2>PhoneNumber is required</h2>");
    }
    if (empty($_POST["correo"])) {
        
        die("<h2>email is required</h2>");
    }
    if (empty($_POST["clave"])) {
        
        die("<h2>password is required</h2>");
    }
    
    if ( ! filter_var($_POST["correo"], FILTER_VALIDATE_EMAIL)) {
        die("<h2>Email must be valid</h2>");
    }

    if (strlen($_POST["correo"]) > 50) {
        die("<h2>Email must be valid</h2>");
    }
    
    if (strlen($_POST["nombre"]) > 15) {
        die("<h2>Name must be at least 15 characters</h2>");
    }
    if (strlen($_POST["apellido"]) > 15) {
        die("<h2>Last Name must be less than 15 characters</h2>");
    }
    if (strlen($_POST["clave"]) < 8) {
        die("<h2>Password must be at least 8 characters</h2>");
    }
    if (strlen($_POST["telefono"]) < 9 || strlen($_POST["telefono"]) > 9) {
        die("<h2>PhoneNumber must be valid</h2>");
    }
    /*Telefono numero debe comenzar con 9*/
    if ( ! preg_match("/[a-z]/i", $_POST["clave"])) {
        die("<h2>Password must contain at least one letter</h2>");
    }
    
    if ( ! preg_match("/[0-9]/", $_POST["clave"])) {
        die("<h2>Password must contain at least one number</h2>");
    }

    if ($_POST["telefono"] < 900000000 || $_POST["telefono"] > 1000000000) {
        die("<h2>PhoneNumber must be valid</h2>");
    }

    $password_hash = password_hash($_POST['clave'], PASSWORD_DEFAULT);

    $mysqli =  require __DIR__ . "/db.php";

    $sql = "INSERT INTO usuarios (nombre, apellido, telefono, email, clave_hash)
            VALUES (?,?,?,?,?)";

    $stmt = $mysqli->stmt_init();

    if( ! $stmt->prepare($sql)){
        die("<h2>email already taken</h2>");
    }

    $stmt->bind_param("sssss",
                      $_POST["nombre"],
                      $_POST["apellido"],
                      $_POST["telefono"],
                      $_POST["correo"],
                      $password_hash);

    if($stmt->execute()){
        header("Location: Sign_In.php");
    } else{
        die("<h2>email already taken</h2>");
    }
}
?>