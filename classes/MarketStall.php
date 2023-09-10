<?php

namespace Market;

require_once(__DIR__ . "/Product.php");

class MarketStall
{
    public $products = [];

    public function __construct(array $products)
    {
        $this->addProductList($products);
    }

    public function addProductList(array $productList)
    {
        foreach ($productList as $product) {
            $this->addProductToMarket($product);
        }
    }
    public function addProductToMarket($products)
    {
        $this->products[$products->getName()] = $products;
    }
    public function getItem($item, $amount)
    {
        $products = $this->products;
        if (array_key_exists($item, $products)) {
            $resultArr = ["Item" => $products[$item], "Amount" => $amount];
            return  $resultArr;
        }
        return false;
    }
}
