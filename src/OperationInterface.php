<?php

declare(strict_types=1);

namespace Bank\CommissionTask;

interface OperationInterface
{
    public function depositCommission($operation): float;

    public function withdrawCommission($operation): float;
}
