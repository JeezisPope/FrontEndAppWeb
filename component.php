<?php
function component($productname, $productprice, $productimg, $productid){
    $element="
    <div class=\"producto\">
        <div class=\"imagee\">
            <img src=\"$productimg\" alt=\"Image1\" class=\"producto__nombre\">
        </div>
        <div class=\"producto__informacion\">
            <p class=\"producto__nombre\">$productname</p>
            <p class=\"producto__precio\">$$productprice</p>
           <input type=\"hidden\" name=\"product_id\" value=$productid>
        </div>

        <form method=\"post\">
        <button class=\"btn w-sm-100\" type=\"submit\" name=\"addto\">Add to Cart</button>
        <input type=\"hidden\" name=\"product_id\" value=\"$productid\">
        </form>
    </div>
    ";

echo $element;
}
?>

