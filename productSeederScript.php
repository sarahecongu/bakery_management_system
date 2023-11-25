<?php

include("includes/core.php");
// $seed = new Api;
// $seed->apiStoreRecipes();

function adjustPrice()
{
    $product = new Product;
    foreach ($product->all() as $prod) {
        $price = rand(200000, 500000);
        $product->update($prod->id, ['price' => $price]);
        echo 'product id= ' . $prod->id . 'updated: '.$price.' <br>';
    }
}

adjustPrice();