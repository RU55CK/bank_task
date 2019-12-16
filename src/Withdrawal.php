<?php

declare(strict_types=1);

namespace Bank\CommissionTask;

class Withdrawal extends Operation
{
    protected $conversion;

    public function __construct(Conversion $conversion)
    {
        $this->conversion = $conversion;
        $this->users = [];
    }

    public function withdrawCommission($data): float
    {
        if ($data[2] === 'legal') {
            $cashoutCommission = (self::WITHDRAW_COMMISSION / 100) * $this->conversion->convertToEur($data[4], $data[5]);
            if ($cashoutCommission < self::WITHDRAW_LEGAL_MIN) {
                $cashoutCommission = self::WITHDRAW_LEGAL_MIN;
            }
        } elseif ($data[2] === 'natural') {
            $user = $data[1];
            if (array_key_exists($user, $this->users)) {
                $user = $this->users[$user];
                $getStatus = $user->getClientStatus();
                $monday = date('Y-m-d', strtotime('last Monday', strtotime('+1 day', strtotime($data[0]))));

                if ($getStatus['lastDate'] < $monday) {
                    $user->resetData();
                    $getStatus = $user->getClientStatus();
                }
            } else {
                $user = new Account();
                $getStatus = $user->getClientStatus();
            }

            $amount = $this->conversion->convertToEur($data[4], $data[5]);
            $user->setClientStatus($amount, $data[0]);
            $this->users[$data[1]] = $user;

            if ($getStatus['weekOperations'] < 3) {
                $newAmount = $getStatus['weekAmount'] + $amount;
                if ($getStatus['weekAmount'] <= 1000) {
                    $excess = $newAmount - 1000;
                } else {
                    $excess = $amount;
                }
                if ($excess <= 0) {
                    $cashoutCommission = 0;
                } else {
                    $cashoutCommission = $excess * (self::WITHDRAW_COMMISSION / 100);
                }
            } else {
                $cashoutCommission = $amount * (self::WITHDRAW_COMMISSION / 100);
            }
        }

        $cashoutCommission = $this->conversion->convertFromEur($cashoutCommission, $data[5]);
        $cashoutCommission = $this->conversion->roundCommission($cashoutCommission, $data[5]);

        return $cashoutCommission;
    }
}
