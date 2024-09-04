<?php
namespace App;


class Basket
{
    /** @var Product[] */
    private array $products = [];

    private DeliveryChargeStrategy $deliveryChargeStrategy;
    private OfferStrategy $offerStrategy;

    public function __construct(
        DeliveryChargeStrategy $deliveryChargeStrategy,
        OfferStrategy $offerStrategy
    ) {
        $this->deliveryChargeStrategy = $deliveryChargeStrategy;
        $this->offerStrategy = $offerStrategy;
    }

    public function add(Product $product): void
    {
        $this->products[] = $product;
    }

    public function total(): float
    {
        $subtotal = array_sum(array_map(fn(Product $product) => $product->getPrice(), $this->products));
        $discount = $this->offerStrategy->apply($this->products);
        $delivery = $this->deliveryChargeStrategy->calculate($subtotal - $discount);

        return $subtotal - $discount + $delivery;
    }
}
