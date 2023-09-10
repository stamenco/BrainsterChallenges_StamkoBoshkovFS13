<?php

namespace Market;

require_once(__DIR__ . "/classes/Product.php");
require_once(__DIR__ . "/classes/MarketStall.php");
require_once(__DIR__ . "/classes/Cart.php");

use Market\Product as Product;
use Market\MarketStall as MarketStall;
use Market\Cart as Cart;

//Creating object of class Product
$orange = new Product('Orange', 35, true);
$potato = new Product('Potato', 240, false);
$nuts = new Product('Nuts', 850, true);
$kiwi = new Product('Kiwi', 670, false);
$pepper = new Product('Pepper', 330, true);
$raspberry = new Product('Raspberry', 555, false);

$carrot = new Product("Carrot", 90, true);


//Creating object of class MarketStall
$fruitsStall = new MarketStall(["kiwi" => $kiwi, "orange" => $orange]);
$vegetableStall = new MarketStall(["potato" => $potato, "pepper" => $pepper]);


//Adding products by function
$fruitsStall->addProductToMarket($nuts);
$fruitsStall->addProductToMarket($raspberry);

$vegetableStall->addProductToMarket($carrot);


//Creating object of class Cart
$cart1 = new Cart();
$cart2 = new Cart();

$cart2->addToCart($fruitsStall->getItem("Orange", 4));
$cart2->addToCart($fruitsStall->getItem("Nuts", 2));
$cart2->addToCart($vegetableStall->getItem("Potato", 6));
$cart2->addToCart($vegetableStall->getItem("Carrot", 3));
$cart2->addToCart($vegetableStall->getItem("Pepper", 9));

echo '<br><hr><br>';

$cart1->printReceipt(); //Empty card

echo '<br><hr><br>';
echo '<br><hr><br>';

$cart2->printReceipt(); //Card with items
