<?php

declare(strict_types=1);

namespace Bank\CommissionTask;

class Account
{
    private $weekAmount;
    private $weekOperations;
    private $lastDate;

    /**
     * @return mixed
     */
    public function getWeekAmount()
    {
        return $this->weekAmount;
    }

    /**
     * @param mixed $weekAmount
     */
    public function setWeekAmount($weekAmount): void
    {
        $this->weekAmount = $weekAmount;
    }

    /**
     * @return mixed
     */
    public function getWeekOperations()
    {
        return $this->weekOperations;
    }

    /**
     * @param mixed $weekOperations
     */
    public function setWeekOperations($weekOperations): void
    {
        $this->weekOperations = $weekOperations;
    }

    /**
     * @return mixed
     */
    public function getLastDate()
    {
        return $this->lastDate;
    }

    /**
     * @param mixed $lastDate
     */
    public function setLastDate($lastDate): void
    {
        $this->lastDate = $lastDate;
    }

    public function resetData(): void
    {
        $this->setLastDate(null);
        $this->setWeekAmount(0);
        $this->setWeekOperations(0);
    }

    public function getClientStatus(): array
    {
        return ['weekOperations' => $this->getWeekOperations(), 'weekAmount' => $this->getWeekAmount(), 'lastDate' => $this->getLastDate()];
    }

    public function setClientStatus($amount, $lastDate): void
    {
        $this->setWeekOperations($this->getWeekOperations() + 1);
        $this->setWeekAmount($this->getWeekAmount() + $amount);
        $this->setLastDate($lastDate);
    }
}
