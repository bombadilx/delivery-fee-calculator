<?php

namespace App\Strategies;

interface DeliveryFeeStrategyInterface
{
    /**
     * @param float $weight
     * @param string $destination
     * @return float
     */
    public function calculate(float $weight, string $destination): float;
}
