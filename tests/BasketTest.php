<?php

namespace Tests;

use App\Basket;
use App\Product;
use App\BasicDeliveryChargeStrategy;
use App\RedWidgetOfferStrategy;
use PHPUnit\Framework\TestCase;

class BasketTest extends TestCase
{
    public function testExampleBaskets(): void
    {
        // product test case scenarios
        // Products Total
        // B01, G01 $37.85
        // R01, R01 $54.37
        // R01, G01 $60.85
        // B01, B01, R01, R01, R01 $98.27

        $strategy = new BasicDeliveryChargeStrategy();
        $offer = new RedWidgetOfferStrategy();

        // Test case 1: B01, G01  expected 37.85
        $basket = new Basket($strategy, $offer);
        $basket->add(new Product('B01', 'Blue Widget', 7.95));
        $basket->add(new Product('G01', 'Green Widget', 24.95));


        // to cater these type of issues in php unit cases
        //54.37500000000001;
        //work around
        $total_value = $basket->total();
        $truncatedNumber = floor($total_value * 100) / 100;
        $this->assertEquals(37.85, number_format($truncatedNumber, 2));


        // Test case 2: R01, R01
        $basket = new Basket($strategy, $offer);
        $basket->add(new Product('R01', 'Red Widget', 32.95));
        $basket->add(new Product('R01', 'Red Widget', 32.95));
        // $this->assertEquals(54.37, floor($basket->total())); // Adjust the expected value based on your logic

        // to cater these type of issues in php unit cases
        //54.37500000000001;
        //work around
        $total_value = $basket->total();
        $truncatedNumber = floor($total_value * 100) / 100;
        $this->assertEquals(54.37, number_format($truncatedNumber, 2));


        // Test case 3: R01, G01  expected 60.85
        $basket = new Basket($strategy, $offer);
        $basket->add(new Product('R01', 'Red Widget', 32.95));
        $basket->add(new Product('G01', 'Green Widget', 24.95));
        // $this->assertEquals(54.37, floor($basket->total())); // Adjust the expected value based on your logic

        // to cater these type of issues in php unit cases
        //54.37500000000001;
        //work around
        $total_value = $basket->total();
        $truncatedNumber = floor($total_value * 100) / 100;
        $this->assertEquals(60.85, number_format($truncatedNumber, 2));

        // case 4 B01, B01, R01, R01, R01 $98.27
        $basket = new Basket($strategy, $offer);
        $basket->add(new Product('B01', 'Blue Widget', 7.95));
        $basket->add(new Product('B01', 'Blue Widget', 7.95));
        $basket->add(new Product('R01', 'Red Widget', 32.95));
        $basket->add(new Product('R01', 'Red Widget', 32.95));
        $basket->add(new Product('R01', 'Red Widget', 32.95));
        // to cater these type of issues in php unit cases
        //54.37500000000001;
        //work around
        $total_value = $basket->total();
        $truncatedNumber = floor($total_value * 100) / 100;
        $this->assertEquals(98.27, number_format($truncatedNumber, 2));
    }
}
