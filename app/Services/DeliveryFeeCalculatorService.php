<?php

namespace App\Services;

use App\Strategies\ExpressDeliveryFeeStrategy;
use App\Strategies\StandardDeliveryFeeStrategy;

class DeliveryFeeCalculatorService
{
    private StandardDeliveryFeeStrategy|ExpressDeliveryFeeStrategy $strategy;

    /**
     * @param string $deliveryType
     */
    public function __construct(string $deliveryType)
    {
        if ($deliveryType === 'express') {
            $this->strategy = new ExpressDeliveryFeeStrategy();
        } else {
            $this->strategy = new StandardDeliveryFeeStrategy();
        }
    }

    /**
     * @param float $weight
     * @param string $destination
     * @return float
     */
    public function calculate(float $weight, string $destination): float
    {
        return $this->strategy->calculate($weight, $destination);
    }
}
