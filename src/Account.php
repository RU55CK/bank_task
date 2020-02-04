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
    public function setWeekAmount(float $weekAmount): void
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
    public function setWeekOperations(float $weekOperations): void
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
    public function setLastDate(string $lastDate): void
    {
        $this->lastDate = $lastDate;
    }

    public function resetData(): void
    {
        $this->setLastDate((string) null);
        $this->setWeekAmount(0);
        $this->setWeekOperations(0);
    }

    public function getClientStatus(): array
    {
        return ['weekOperations' => $this->getWeekOperations(), 'weekAmount' => $this->getWeekAmount(), 'lastDate' => $this->getLastDate()];
    }

    public function setClientStatus(float $amount, string $lastDate): void
    {
        $this->setWeekOperations($this->getWeekOperations() + 1);
        $this->setWeekAmount($this->getWeekAmount() + $amount);
        $this->setLastDate($lastDate);
    }
}
