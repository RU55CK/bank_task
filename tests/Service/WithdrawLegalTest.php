<?php

namespace Bank\CommissionTask\Tests\Service;

use Bank\CommissionTask\Conversion;
use Bank\CommissionTask\Withdrawal;
use PHPUnit\Framework\TestCase;

class WithdrawLegalTest extends TestCase
{
    private $convert;
    private $withdraw;

    public function setUp()
    {
        $this->convert = new Conversion();
        $this->withdraw = new Withdrawal($this->convert);
    }

    /**
     * @dataProvider dataProviderForWithdrawMinTesting
     */
    public function testWithdrawMinLegal($expectedResult)
    {
        $result = $this->withdraw->withdrawCommission($expectedResult);
        $this->assertEquals(0.5, $result);
    }

    /**
     * @dataProvider dataProviderForWithdrawNormalTesting
     */
    public function testWithdrawNormalLegal($expectedResult)
    {
        $result = $this->withdraw->withdrawCommission($expectedResult);
        $this->assertEquals(0.9, $result);
    }

    public function dataProviderForWithdrawMinTesting(): array
    {
        return [
            [['2016-01-06',2,'legal','cash_out',10.00,'EUR']]
        ];
    }

    public function dataProviderForWithdrawNormalTesting(): array
    {
        return [
            [['2016-01-06',2,'legal','cash_out',300.00,'EUR']]
        ];
    }
}
