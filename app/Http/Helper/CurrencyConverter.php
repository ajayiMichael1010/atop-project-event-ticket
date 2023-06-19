<?php

namespace App\Http\Helper;

use AmrShawky\LaravelCurrency\Facade\Currency;

class CurrencyConverter
{
    public const DEFAULT_CURRENCY = ["name" => "Euro","shortName" =>"EUR", "symbol" => "€"];
    public const CURRENCY_TYPES = [
        [
            "name" => "Naira",
            "shortName" => "NGN",
            "symbol" => "&#x20A6;"
        ],
        [
            "name" => "Euro",
            "shortName" => "EUR",
            "symbol" => "&#x20AC;"
        ],
        [
            "name" => "Dollar",
            "shortName" => "USD",
            "symbol" => "&#36;"
        ]
    ];

    public static function getConvertedAmount(float $amount, string $from, string $to): array
    {
        $convertedAmount = Currency::convert()
            ->from($from)
            ->to($to)
            ->amount($amount)
            ->get();

        $currencyTypeDetails = self::getCurrencyTypeDetails($to);

        return [
            "convertedAmount" => $convertedAmount,
            "currencyType" => $currencyTypeDetails
        ];
    }

    public static function getCurrencyTypeDetails(string $currencyType)
    {
        $currencyTypeDetails = array_values(
            array_filter(self::CURRENCY_TYPES, fn($currency) => $currency["shortName"] === $currencyType)
        );

        if (empty($currencyTypeDetails)) {
            throw new \InvalidArgumentException("Invalid target currency: $currencyTypeDetails");
        }

        return $currencyTypeDetails[0];
    }

    public static function getCurrencySymbol(string $currencyType){
        $currencyDetails = self::getCurrencyTypeDetails($currencyType);
        return $currencyDetails['symbol'];
    }

    public static function currencyFormat($amount, $currencyType): string
    {
        $currencySymbol = self::getCurrencySymbol($currencyType);
        return $currencySymbol."".number_format($amount, 2, '.', ',');
    }
}
