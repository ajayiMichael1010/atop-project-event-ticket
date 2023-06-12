<?php

namespace App\Http\Helper;
use AmrShawky\LaravelCurrency\Facade\Currency;

class CurrencyConverter
{
    public const DEFAULT_CURRENCY = ["name"=>"event_charges", "symbol"=>"&#x20AC;"];
    public const CURRENCY_TYPES =[
        [
        "name" =>"Naira",
        "shortName" =>"NGN",
        "symbol" => "&#8358;"
        ],
        [
            "name" =>"EURO",
            "shortName" =>"EUR",
            "symbol" => "&#x20AC;"
        ]

    ];

    public static function getConvertedAmount(float $amount, string $from, string $to)
    {
        return Currency::convert()
            ->from($from)
            ->to($to)
            ->amount($amount)
            ->get();
    }
}
