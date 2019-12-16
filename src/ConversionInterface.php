<?php

declare(strict_types=1);

namespace Bank\CommissionTask;

interface ConversionInterface
{
    public function convertToEur($amount, $currency): float;

    public function convertFromEur($amount, $currency): float;
}
