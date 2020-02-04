<?php

declare(strict_types=1);

namespace Bank\CommissionTask;

class Withdrawal implements WithdrawalInterface
{
    protected $conversion;

    public function __construct(Conversion $conversion)
    {
        $this->conversion = $conversion;
        $this->users = [];
    }

    public function withdrawCommission(array $data): float
    {
        if ($data[Config::USER_TYPE] === Config::LEGAL_USER) {
            $cashoutCommission = (Config::WITHDRAW_COMMISSION / 100) * $this->conversion->convertToEur($data[Config::OPERATION_AMOUNT], $data[Config::OPERATION_CURRENCY]);
            if ($cashoutCommission < Config::WITHDRAW_LEGAL_MIN) {
                $cashoutCommission = Config::WITHDRAW_LEGAL_MIN;
            }
        } elseif ($data[Config::USER_TYPE] === Config::NATURAL_USER) {
            $user = $data[Config::USER_ID];
            if (array_key_exists($user, $this->users)) {
                $user = $this->users[$user];
                $getStatus = $user->getClientStatus();
                $monday = date('Y-m-d', strtotime('last Monday', strtotime('+1 day', strtotime($data[Config::OPERATION_DATE]))));

                if ($getStatus['lastDate'] < $monday) {
                    $user->resetData();
                    $getStatus = $user->getClientStatus();
                }
            } else {
                $user = new Account();
                $getStatus = $user->getClientStatus();
            }

            $amount = $this->conversion->convertToEur($data[Config::OPERATION_AMOUNT], $data[Config::OPERATION_CURRENCY]);
            $user->setClientStatus($amount, $data[Config::OPERATION_DATE]);
            $this->users[$data[Config::USER_ID]] = $user;

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
                    $cashoutCommission = $excess * (Config::WITHDRAW_COMMISSION / 100);
                }
            } else {
                $cashoutCommission = $amount * (Config::WITHDRAW_COMMISSION / 100);
            }
        }

        $cashoutCommission = $this->conversion->convertFromEur($cashoutCommission, $data[Config::OPERATION_CURRENCY]);
        $cashoutCommission = $this->conversion->roundCommission($cashoutCommission, $data[Config::OPERATION_CURRENCY]);

        return $cashoutCommission;
    }
}
