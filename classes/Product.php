<?php

namespace Market;

class Product
{
    private string $name;
    private float $price;
    private bool $sellingByKg;

    public function __construct(string $name, float $price, bool $sellingByKg)
    {
        $this->name = $name;
        $this->price = $price;
        $this->sellingByKg = $sellingByKg;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice(float $price)
    {
        $this->price = $price;
    }

    public function getSellingByKg()
    {
        return $this->sellingByKg;
    }

    public function setSellingByKg(bool $sellingByKg)
    {
        $this->sellingByKg = $sellingByKg;
    }
}
