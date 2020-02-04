<?php

declare(strict_types=1);

namespace Bank\CommissionTask;

interface WithdrawalInterface
{
    public function withdrawCommission(array $operation): float;
}
