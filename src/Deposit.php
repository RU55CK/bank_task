<?php

declare(strict_types=1);

namespace Bank\CommissionTask;

class Deposit implements DepositInterface
{
    protected $conversion;

    public function __construct(Conversion $conversion)
    {
        $this->conversion = $conversion;
    }

    public function depositCommission(array $data): float
    {
        $cashinCommission = (Config::DEPOSIT_COMMISSION / 100) * $this->conversion->convertToEur($data[Config::OPERATION_AMOUNT], $data[Config::OPERATION_CURRENCY]);
        $cashinCommission = $this->conversion->convertFromEur($cashinCommission, $data[Config::OPERATION_CURRENCY]);
        if ($cashinCommission >= Config::DEPOSIT_COMMISSION_MAX) {
            $cashinCommission = Config::DEPOSIT_COMMISSION_MAX;
        }

        $cashinCommission = $this->conversion->roundCommission($cashinCommission, $data[Config::OPERATION_CURRENCY]);

        return $cashinCommission;
    }
}
