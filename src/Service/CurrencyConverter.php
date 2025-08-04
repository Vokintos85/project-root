<?php
namespace App\Service;

class CurrencyConverter
{
    public function getAvailableCurrencies(): array
    {
        return ["USD", "EUR", "GBP", "JPY"];
    }

    public function convert(string $from, string $to, float $amount): float
    {
        // Простая заглушка - в реальном проекте используйте API
        $rates = [
            "USD" => 1.0,
            "EUR" => 0.93,
            "GBP" => 0.79,
            "JPY" => 151.47
        ];
        
        if (!isset($rates[$from]) || !isset($rates[$to])) {
            throw new \Exception("Invalid currency code");
        }

        return $amount * ($rates[$to] / $rates[$from]);
    }
}
