<?php

namespace Market;

class Cart
{
    private $cartItems = [];

    public function addToCart($items)
    {
        array_push($this->cartItems, $items);
    }

    public function getCartItems()
    {
        return $this->cartItems;
    }

    public function printReceipt()
    {
        if (empty($this->cartItems)) {
            echo "Your cart is empty.";
        } else {
            $productList = $this->cartItems;
            $result = "";
            $totalPrice = null;
            foreach ($productList as $values) {

                $object = $values['Item'];
                $amount = $values['Amount'];
                $name = $object->getName();
                $price = $object->getPrice();
                $getSellingByKg = $object->getSellingByKg();
                $productPrice = $amount * $price;

                $productInfo = "$name | $amount" . ($getSellingByKg ? "kgs" : "gunny sacks") . " | Total: " . $productPrice . " MKD";
                $result .= $productInfo . "<br>";
                $totalPrice += $productPrice;
            }
            echo "$result <br> Final Price Amount: $totalPrice MKD <br><hr>";
        }
    }
}
