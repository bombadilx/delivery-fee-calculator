<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CalculateDeliveryFeeRequest;
use App\Services\DeliveryFeeCalculatorService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DeliveryFeeController extends Controller
{
    /**
     * @param CalculateDeliveryFeeRequest $request
     * @return JsonResponse
     */
    public function calculate(CalculateDeliveryFeeRequest $request): JsonResponse
    {
        $data = $request->validated();
        $calculator = new DeliveryFeeCalculatorService($data['delivery_type']);
        $fee = $calculator->calculate($data['weight'], $data['destination']);

        return response()->json([
            'fee' => $fee
        ]);
    }
}
