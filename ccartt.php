<?php
function cartElement($productimg, $productname, $productprice, $productid){
    $element = "
    <form class=\"producto_carro dos_columnas no_margin\" action=\"Carrito.php?action=remove&id=$productid\" method=\"post\">
    <article>
    <img class=\"img_form\" src=\"$productimg\">
    </article>
    <article>
    <h2 class=\"texto_carro\">$productname</h2>
    <h2>$$productprice</h2>
    </article>
    <div class=\"separar\"></div>
    <article>
    </article>
    <article>
    <button type=\"submit\" class=\"btn w-sm-100\" name=\"remove\">Remove</button>
    </article>
    </form>
    ";
    echo $element;
}
?>