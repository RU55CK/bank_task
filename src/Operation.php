<?php

declare(strict_types=1);

namespace Bank\CommissionTask;

class Operation implements OperationInterface
{
    const DEPOSIT_COMMISSION = 0.03;
    const WITHDRAW_COMMISSION = 0.3;
    const WITHDRAW_LEGAL_MIN = 0.5;
    const DEPOSIT_COMMISSION_MAX = 5;

    public function depositCommission($operation): float
    {
        // TODO: Implement deposit() method.
    }

    public function withdrawCommission($operation): float
    {
        // TODO: Implement withdraw() method.
    }
}
