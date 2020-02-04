<?php

declare(strict_types=1);

namespace Bank\CommissionTask;

interface ConversionInterface
{
    public function convertToEur(float $amount, string $currency): float;

    public function convertFromEur(float $amount, string $currency): float;
}
