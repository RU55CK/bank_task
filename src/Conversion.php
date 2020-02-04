<?php

declare(strict_types=1);

namespace Bank\CommissionTask;

class Conversion implements ConversionInterface
{
    public function convertToEur(float $amount, string $currency): float
    {
        switch ($currency) {
            case Config::USD_NAME:
                $converted = $amount / Config::USD;
                break;
            case Config::JPY_NAME:
                $converted = $amount / Config::JPY;
                break;
            default:
                $converted = $amount;
        }

        return $converted;
    }

    public function convertFromEur(float $amount, string $currency): float
    {
        switch ($currency) {
            case Config::USD_NAME:
                $converted = $amount * Config::USD;
                break;
            case Config::JPY_NAME:
                $converted = $amount * Config::JPY;
                break;
            default:
                $converted = $amount;
        }

        return $converted;
    }

    public function roundCommission(float $commission, string $currency): float
    {
        if ($currency === Config::JPY_NAME) {
            $rounded = ceil($commission);
        } else {
            $rounded = $commission * 100;
            $rounded = round($rounded, 2);
            $rounded = ceil($rounded);
            $rounded = $rounded / 100;
        }

        return $rounded;
    }
}
