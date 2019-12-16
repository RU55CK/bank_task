<?php

namespace Bank\CommissionTask\Tests\Service;

use PHPUnit\Framework\TestCase;
use Bank\CommissionTask\Conversion;
use Bank\CommissionTask\Deposit;

class DepositTest extends TestCase
{
    private $convert;
    private $deposit;

    public function setUp()
    {
        $this->convert = new Conversion();
        $this->deposit = new Deposit($this->convert);
    }


    public function testDepositEur()
    {
        $data = $this->dataProviderForDepositTesting();
        $commission = $this->deposit->depositCommission($data[0]);
        $this->assertTrue($commission < 5, 'Commission is < 5EUR');
        $commission = $this->deposit->depositCommission($data[1]);
        $this->assertTrue($commission == 5, 'Commission is > 5EUR');
        $commission = $this->deposit->depositCommission($data[2]);
        $this->assertTrue($commission == 5, 'Commission is = 5EUR');

    }

    public function testDepositUsd()
    {
        $data = $this->dataProviderForDepositTesting();
        $commission = $this->deposit->depositCommission($data[3]);
        $this->assertTrue($commission < 5, 'Commission is < 5EUR');
        $commission = $this->deposit->depositCommission($data[4]);
        $this->assertTrue($commission == 5, 'Commission is > 5EUR');
        $commission = $this->deposit->depositCommission($data[5]);
        $this->assertTrue($commission == 5, 'Commission is = 5EUR');

    }

    public function testDepositJpy()
    {
        $data = $this->dataProviderForDepositTesting();
        $commission = $this->deposit->depositCommission($data[3]);
        $this->assertTrue($commission < 5, 'Commission is < 5EUR');
        $commission = $this->deposit->depositCommission($data[4]);
        $this->assertTrue($commission == 5, 'Commission is > 5EUR');
        $commission = $this->deposit->depositCommission($data[5]);
        $this->assertTrue($commission == 5, 'Commission is = 5EUR');

    }

    public function dataProviderForDepositTesting(): array
    {
        return [ ['2016-01-05',1,'natural','cash_in',200.00,'EUR'],
            ['2016-01-05',1,'natural','cash_in',200000.00,'EUR'],
            ['2016-01-05',1,'natural','cash_in',16667.00,'EUR'],
            ['2016-01-05',1,'natural','cash_in',200.00,'USD'],
            ['2016-01-05',1,'natural','cash_in',200000.00,'USD'],
            ['2016-01-05',1,'natural','cash_in',19200.00,'USD'],
            ['2016-01-05',1,'natural','cash_in',20000.00,'JPY'],
            ['2016-01-05',1,'natural','cash_in',5000000.00,'JPY'],
            ['2016-01-05',1,'natural','cash_in',2199998.00,'JPY']
            ];
    }
}
