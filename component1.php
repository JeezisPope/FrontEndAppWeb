<?php
function component($productname, $productprice, $productimg, $productid){
    $element="
    <div class=\"producto\">
    <img class=\"producto__nombre\" src=\"$productimg\" alt=\"imagen camisa\">
    <div class=\"producto__informacion\">
        <p class=\"producto__nombre\">$productname</p>
        <p class=\"producto__precio\">$$productprice</p>
    </div>
    </div>
    ";

echo $element;
}
?>