<?php
    require "db.php";
    require "fpdf/fpdf.php";
    require "ccartt.php";

    session_start();

    isset($_SESSION["usuarios_id"]);

   

    $sql = "SELECT nombre, apellido, email FROM usuarios WHERE id = {$_SESSION['usuarios_id']}";
    $resultado = $mysqli->query($sql);

    $pdf = new FPDF("P", "mm", "letter");
    $pdf->AddPage();
    $pdf->Ln(5);
    $img = "img/f2.png";

    $pdf->Image($img,40,10,-100);
    $pdf->Ln(45);
    $pdf->SetFont("Arial", "B", 12);
    $pdf->Cell(190, 5, "Resumen de Compra", 0, 1, "C");

    $pdf->Ln(2);

    $pdf->SetFont("Arial", "B", 9);
    $pdf->Cell(60, 5, "Name", 1, 0, "C");
    $pdf->Cell(60, 5, "Last Name", 1, 0, "C");
    $pdf->Cell(80, 5, "Email", 1, 1, "C");

    $fila = $resultado->fetch_assoc();
        $pdf->Cell(60, 5, $fila['nombre'], 1, 0, "C");
        $pdf->Cell(60, 5, $fila['apellido'], 1, 0, "C");
        $pdf->Cell(80, 5, $fila['email'], 1, 1, "C");

    $pdf->Ln(2);

    $sql_envio = "SELECT street, city, district, numbero FROM envio WHERE id = (SELECT max(id) FROM envio)";
    $res = $mysqli->query($sql_envio);

    $fila_env = $res->fetch_assoc();
    
    $pdf->SetFont("Arial", "B", 9);
    $pdf->Cell(100, 5, "Street:", 1, 0, "C");
    $pdf->Cell(100, 5, $fila_env['street'], 1, 1, "C");
    $pdf->Cell(100, 5, "City:", 1, 0, "C");
    $pdf->Cell(100, 5, $fila_env['city'], 1, 1, "C");
    $pdf->Cell(100, 5, "District:", 1, 0, "C");
    $pdf->Cell(100, 5, $fila_env['district'], 1, 1, "C");
    $pdf->Cell(100, 5, "Number:", 1, 0, "C");
    $pdf->Cell(100, 5, $fila_env['numbero'], 1, 1, "C");

    $sql_pago = "SELECT cardholder, cardnumber FROM metodopago WHERE id = (SELECT max(id) FROM metodopago)";
    $result = $mysqli->query($sql_pago);

    $fila_pag = $result->fetch_assoc();

    $pdf->Ln(2);
    
    $pdf->SetFont("Arial", "B", 9);

    $pdf->Cell(100, 5, "Cardholder:", 0, 0, "R");

    $pdf->Cell(100, 5, $fila_pag['cardholder'], 0, 1, "L");

    $pdf->Cell(100, 5, "Card Number:", 0, 0, "R");

    $pdf->Cell(10, 5, "xxxx - ", 0, 0, "L");

    $pdf->Cell(8, 5, substr($fila_pag['cardnumber'], -4), 0, 1, "L");

    $pdf->Ln(2);

    isset($_SESSION['cart']);

    $total = 0;

    $product_id = array_column($_SESSION['cart'], 'product_id');
    $sql_product = "SELECT * FROM products";
    $resultt = $mysqli->query($sql_product);
    
    $pdf->SetFont("Arial", "B", 12);
    $pdf->Cell(190, 5, "Productos Adquiridos", 0, 1, "C");
    $pdf->Ln(1);

    $total = 0;
    $product_id = array_column($_SESSION['cart'], 'product_id');
                
    $pdf->Cell(50, 5, "Product:", 1, 0, "C");
    $pdf->Cell(50, 5, "Price:", 1, 0, "C");
    $pdf->Cell(50, 5, "Selected Quantity:", 1, 0, "C");
    $pdf->Cell(50, 5, "Total Price:", 1, 1, "C");
    if(!empty($_SESSION["cart"])){

        foreach($_SESSION["cart"] as $keys => $values){
                $pdf->SetFont("Arial", "B", 9);
                $pdf->Cell(50, 5, $values["item_name"], 1, 0, "C");
                $pdf->Cell(5, 5, "$", 1, 0, "C");
                $pdf->Cell(45, 5, $values["item_price"], 1, 0, "C");
                $pdf->Cell(50, 5, $values["item_quantity"], 1, 0, "C");
                $pdf->Cell(50, 5, number_format($values["item_price"] * $values["item_quantity"], 2), 1, 1, "C");
                $total = $total + ($values["item_price"] * $values["item_quantity"]);
            }
        }

    $pdf->Ln(5);
    $pdf->SetFont("Arial", "B", 12);
    $pdf->Cell(100, 5, "Pago Total: ", 1, 0, "C");
    $pdf->Cell(5, 5, "$", 1, 0, "C");
    $pdf->Cell(95, 5, $total, 1, 1, "C");


    $pdf->Output();




   






?>

