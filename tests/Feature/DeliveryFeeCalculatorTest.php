<?php

namespace Tests\Feature;

use App\Services\DeliveryFeeCalculatorService;

use Tests\TestCase;

class DeliveryFeeCalculatorTest extends TestCase
{
    // Тест для стандартної доставки
    public function test_it_calculates_standard_delivery_fee_for_valid_data()
    {
        $calculator = new DeliveryFeeCalculatorService('standard');

        $fee = $calculator->calculate(3.5, 'kyiv');  // Вага 3.5 кг для Києва
        $this->assertEquals(58.5, $fee); // Очікуємо: 50 (базова вартість) + 10 (за 1.5 кг) - 10% знижка
    }

    // Тест для експрес доставки
    public function test_it_calculates_express_delivery_fee_for_valid_data()
    {
        $calculator = new DeliveryFeeCalculatorService('express');

        $fee = $calculator->calculate(3.5, 'kyiv');  // Вага 3.5 кг для Києва
        $this->assertEquals(103.5, $fee); // Очікуємо: 100 (базова вартість) + 10 (за 1.5 кг) - 10% знижка
    }

    // Тест для стандартної доставки без знижки
    public function test_it_calculates_standard_delivery_fee_without_discount_for_non_kyiv_destination()
    {
        $calculator = new DeliveryFeeCalculatorService('standard');

        $fee = $calculator->calculate(3.5, 'odessa');  // Вага 3.5 кг для Одеси
        $this->assertEquals(65, $fee); // Очікуємо: 50 (базова вартість) + 10 (за 1.5 кг)
    }

    // Тест для експрес доставки без знижки
    public function test_it_calculates_express_delivery_fee_without_discount_for_non_kyiv_destination()
    {
        $calculator = new DeliveryFeeCalculatorService('express');

        $fee = $calculator->calculate(3.5, 'odessa');  // Вага 3.5 кг для Одеси
        $this->assertEquals(115, $fee); // Очікуємо: 100 (базова вартість) + 10 (за 1.5 кг)
    }

    // Тест для стандартної доставки з вагою менше 2 кг
    public function test_it_calculates_standard_delivery_fee_for_weight_less_than_2kg()
    {
        $calculator = new DeliveryFeeCalculatorService('standard');

        $fee = $calculator->calculate(1.5, 'kyiv');  // Вага 1.5 кг для Києва
        $this->assertEquals(45, $fee); // Очікуємо: 50 (базова вартість) - 10% знижка
    }

    // Тест для експрес доставки з вагою менше 2 кг
    public function test_it_calculates_express_delivery_fee_for_weight_less_than_2kg()
    {
        $calculator = new DeliveryFeeCalculatorService('express');

        $fee = $calculator->calculate(1.5, 'odessa');  // Вага 1.5 кг для Одеси
        $this->assertEquals(100, $fee); // Очікуємо: 100 (базова вартість), знижки не буде
    }
}
