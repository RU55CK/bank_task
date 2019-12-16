<?php

declare(strict_types=1);

namespace Bank\CommissionTask;

class Conversion implements ConversionInterface
{
    const USD = 1.1497;
    const JPY = 129.53;

    public function convertToEur($amount, $currency): float
    {
        $conversionCurrent = floatval($amount); // using floatval to avoid type juggling

        switch ($currency) {
            case 'USD':
                $converted = (float) $conversionCurrent / self::USD;
                break;
            case 'JPY':
                $converted = (float) $conversionCurrent / self::JPY;
                break;
            default:
                $converted = $conversionCurrent;
        }

        return $converted;
    }

    public function convertFromEur($amount, $currency): float
    {
        $conversionCurrent = floatval($amount); // using floatval to avoid type juggling

        switch ($currency) {
            case 'USD':
                $converted = (float) $conversionCurrent * self::USD;
                break;
            case 'JPY':
                $converted = (float) $conversionCurrent * self::JPY;
                break;
            default:
                $converted = $conversionCurrent;
        }

        return $converted;
    }

    public function roundCommission($commission, $currency)
    {
        if ($currency === 'JPY') {
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
