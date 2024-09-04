<?php

namespace App;

class Product
{
    private string $code;
    private string $name;
    private float $price;

    public function __construct(string $code, string $name, float $price)
    {
        $this->code = $code;
        $this->name = $name;
        $this->price = $price;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}

//test product class
//$product = new Product('B01', 'Blue Widget', 7.95);
//echo $product->getName() . PHP_EOL;
//echo $product->getPrice() . PHP_EOL;
//echo $product->getCode() . PHP_EOL;    
