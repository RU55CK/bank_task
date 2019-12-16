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


    public function testWithdrawEur()
    {

        $data = $this->dataProviderForWithdrawTesting();
        $commission = $this->withdraw->withdrawCommission($data[0]);
        $this->assertTrue($commission > 0.5 , 'Commission is > 0.50Eur');
        $commission = $this->withdraw->withdrawCommission($data[2]);
        $this->assertTrue($commission == 0.5 , 'Commission is = 0.50Eur');
        $commission = $this->withdraw->withdrawCommission($data[1]);
        $this->assertTrue($commission == 0.5 , 'Commission is < 0.50Eur');
    }

    public function dataProviderForWithdrawTesting(): array
    {
        return [ ['2016-01-06',2,'legal','cash_out',300.00,'EUR'],
            ['2016-01-06',2,'legal','cash_out',10.00,'EUR'],
            ['2016-01-06',2,'legal','cash_out',166.50,'EUR'] ];
    }
}
