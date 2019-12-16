<?php

declare(strict_types=1);

namespace Bank\CommissionTask;

class Deposit extends Operation
{
    protected $conversion;

    public function __construct(Conversion $conversion)
    {
        $this->conversion = $conversion;
    }

    public function depositCommission($data): float
    {
        $cashinCommission = (self::DEPOSIT_COMMISSION / 100) * $this->conversion->convertToEur($data[4], $data[5]);
        $cashinCommission = $this->conversion->convertFromEur($cashinCommission, $data[5]);
        if ($cashinCommission >= self::DEPOSIT_COMMISSION_MAX) {
            $cashinCommission = self::DEPOSIT_COMMISSION_MAX;
        }

        $cashinCommission = $this->conversion->roundCommission($cashinCommission, $data[5]);

        return $cashinCommission;
    }
}
