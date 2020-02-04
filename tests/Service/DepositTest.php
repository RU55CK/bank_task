<?php

namespace Bank\CommissionTask\Tests\Service;


use Bank\CommissionTask\Conversion;
use Bank\CommissionTask\Deposit;
use PHPUnit\Framework\TestCase;

class DepositTest extends TestCase
{
    private $convert;
    private $deposit;

    public function setUp()
    {
        $this->convert = new Conversion();
        $this->deposit = new Deposit($this->convert);
    }

    /**
     * @dataProvider dataProviderForDepositEurTesting
     */
    public function testDepositEur($expectedResult)
    {

        $result = $this->deposit->depositCommission($expectedResult);
        $this->assertEquals(0.04, $result);
    }
    /**
     * @dataProvider dataProviderForDepositUsdTesting
     */
    public function testDepositUsd($expectedResult)
    {
        $result = $this->deposit->depositCommission($expectedResult);
        $this->assertEquals(0.06, $result);
    }

    /**
     * @dataProvider dataProviderForDepositJpyTesting
     */
    public function testDepositJpy($expectedResult)
    {
        $result = $this->deposit->depositCommission($expectedResult);
        $this->assertEquals(4, $result);
    }
    /**
     * @dataProvider dataProviderForDepositMaxTesting
     */
    public function testDepositMax($expectedResult)
    {
        $result = $this->deposit->depositCommission($expectedResult);
        $this->assertEquals(5, $result);
    }

    public function dataProviderForDepositEurTesting(): array
    {
        return [
            [['2016-01-05','1','natural','cash_in',120.00,'EUR']],
        ];
    }
    public function dataProviderForDepositUsdTesting(): array {
        return [
            [['2016-01-05','1','natural','cash_in',200.00,'USD']],
        ];
    }
    public function dataProviderForDepositJpyTesting(): array {
        return [
            [['2016-01-05','1','natural','cash_in',10410,'JPY']],
        ];
    }
    public function dataProviderForDepositMaxTesting(): array {
        return [
            [['2016-01-05','1','natural','cash_in',200000,'Eur']],
        ];
    }
}
