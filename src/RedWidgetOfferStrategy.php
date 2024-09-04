<?php
namespace App;

interface OfferStrategy
{
/**
* @param Product[] $products
* @return float
*/
public function apply(array $products): float;
}

class RedWidgetOfferStrategy implements OfferStrategy
{
/**
* @param Product[] $products
* @return float
*/
public function apply(array $products): float
{
$redWidgets = array_filter($products, fn(Product $product) => $product->getCode() === 'R01');
$discount = 0;

if (count($redWidgets) > 1) {
$discount = min(array_map(fn(Product $product) => $product->getPrice(), $redWidgets)) / 2;
}

return $discount;
}
}