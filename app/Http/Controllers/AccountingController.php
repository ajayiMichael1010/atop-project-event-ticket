<?php

namespace App\Http\Controllers;

use App\Http\Helper\CurrencyConverter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AccountingController extends Controller
{
    public function convertCurrency(Request $request): JsonResponse
    {
        $amount = $request->amount;
        $from = CurrencyConverter::DEFAULT_CURRENCY["shortName"];
        $to = $request->to;

        $convertedAAmount = CurrencyConverter::getConvertedAmount($amount,$from,$to);

        return response()->json($convertedAAmount,200,[]);
    }
}
