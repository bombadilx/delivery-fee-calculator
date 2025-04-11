<?php

namespace App\Strategies;

class StandardDeliveryFeeStrategy implements DeliveryFeeStrategyInterface
{
    private const BASE_FEE = 50;
    private const WEIGHT_COST = 10;

    /**
     * @param float $weight
     * @param string $destination
     * @return float
     */
    public function calculate(float $weight, string $destination): float
    {
        $fee = self::BASE_FEE;

        if ($weight > 2) {
            $fee += ($weight - 2) * self::WEIGHT_COST;
        }
        if (strtolower($destination) === 'kyiv') {
            $fee *= 0.9;
        }

        return $fee;
    }
}
