<?php


namespace Bank\CommissionTask;

class Conversion implements ConversionInterface
{
    private $operationCurrency;
    private $operationAmount;

    public function __construct(string $operationCurrency, $operationAmount)
    {
        $this->setOperationCurrency($operationCurrency);
        $this->setOperationAmount($operationAmount);
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
    public function setOperationCurrency($operationCurrency): void
    {
        $this->operationCurrency = $operationCurrency;
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
    public function setOperationAmount($operationAmount): void
    {
        $this->operationAmount = $operationAmount;
    }

    public function convertToEur($conversion): float
    {
        $conversionCurrent = floatval($this->getOperationAmount()); // using floatval to avoid type juggling
        $usd = floatval(1.1497);
        $jpy = floatval(129.53);
        $eur = floatval(1.00);
        switch($this->getOperationCurrency()) {
            case "USD":
                $converted = (float) $conversionCurrent * $usd;
                break;
            case "JPY":
                $converted = (float) $conversionCurrent * $jpy;
                break;
            default:
                $converted = $conversionCurrent;
        }

        return $converted;
    }

}