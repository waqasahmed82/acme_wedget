<?php

namespace App;

interface DeliveryChargeStrategy
{
    public function calculate(float $total): float;
}

class BasicDeliveryChargeStrategy implements DeliveryChargeStrategy{
    public function calculate(float $total): float     {
        if ($total < 50) {
            return 4.95;
        } elseif ($total < 90) {
            return 2.95;
        } else {
            return 0.00;
        }
    }
}

