<?php

namespace Bank\CommissionTask;

class Operation implements OperationInterface
{
    private $operationDate;
    private $userId;
    private $userType;
    private $operationType;
    private $operationAmount;
    private $operationCurrency;

    /**
     * @return mixed
     */
    public function getOperationDate()
    {
        return $this->operationDate;
    }

    /**
     * @param mixed $operationDate
     */
    public function setOperationDate($operationDate)
    {
        $this->operationDate = $operationDate;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getUserType()
    {
        return $this->userType;
    }

    /**
     * @param mixed $userType
     */
    public function setUserType($userType)
    {
        $this->userType = $userType;
    }

    /**
     * @return mixed
     */
    public function getOperationType()
    {
        return $this->operationType;
    }

    /**
     * @param mixed $operationType
     */
    public function setOperationType($operationType)
    {
        $this->operationType = $operationType;
    }

    /**
     * @return mixed
     */
    public function getOperationAmount()
    {
        return $this->operationAmount;
    }

    /**
     * @param mixed $operationAmount
     */
    public function setOperationAmount($operationAmount)
    {
        $this->operationAmount = $operationAmount;
    }

    /**
     * @return mixed
     */
    public function getOperationCurrency()
    {
        return $this->operationCurrency;
    }

    /**
     * @param mixed $operationCurrency
     */
    public function setOperationCurrency($operationCurrency)
    {
        $this->operationCurrency = $operationCurrency;
    }


    public function depositCommission($operation): float
    {
        // TODO: Implement deposit() method.
    }

    public function withdraw($operation): void
    {
        // TODO: Implement withdraw() method.
    }
}