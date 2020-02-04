<?php

declare(strict_types=1);

namespace Bank\CommissionTask;

interface DepositInterface
{
    public function depositCommission(array $operation): float;
}
