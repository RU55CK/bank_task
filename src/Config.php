<?php

declare(strict_types=1);

namespace Bank\CommissionTask;

class Config
{
    const FILE_NAME = 'input.csv';

    // Indexes
    const OPERATION_DATE = 0;
    const USER_ID = 1;
    const USER_TYPE = 2;
    const OPERATION_TYPE = 3;
    const OPERATION_AMOUNT = 4;
    const OPERATION_CURRENCY = 5;

    // User types
    const LEGAL_USER = 'legal';
    const NATURAL_USER = 'natural';

    // Commissions
    const DEPOSIT_COMMISSION = 0.03;
    const WITHDRAW_COMMISSION = 0.3;
    const WITHDRAW_LEGAL_MIN = 0.5;
    const DEPOSIT_COMMISSION_MAX = 5;

    // Currencies
    const USD = 1.1497;
    const JPY = 129.53;
    const USD_NAME = 'USD';
    const JPY_NAME = 'JPY';
}
