<?php
function carrito($productimg, $productname, $productprice){
    $element = "
    <article>
        <img class=\"img_form\" src=$productimg>
    </article>
    <article>
        <h2 class=\"texto_carro\">$productname</h2>
        <h2>$$productprice</h2>
    </article>
    ";

    echo $element;
}

?>