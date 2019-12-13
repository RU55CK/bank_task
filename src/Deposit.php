<?php


namespace Bank\CommissionTask;


class Deposit extends Operation
{
    public function __construct(\DateTime $operationDate, $operationAmount, $userId, $operationType, $userType, $operationCurrency)
    {
        $this->setOperationDate($operationDate);
        $this->setOperationAmount($operationAmount);
        $this->setUserId($userId);
        $this->setOperationType($operationType);
        $this->setUserType($userType);
        $this->setOperationCurrency($operationCurrency);
    }

    public function depositCommission($operation): float
    {
        $commision = 0.03;
        $cashinCommission = ($commision / 100) * $this->getOperationAmount();

        if($cashinCommission >= 5) {
            $cashinCommission = 5;
        }

        return $cashinCommission;
    }


}