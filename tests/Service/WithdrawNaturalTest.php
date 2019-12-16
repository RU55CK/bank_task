<?php

namespace Bank\CommissionTask\Tests\Service;

use PHPUnit\Framework\TestCase;
use Bank\CommissionTask\Conversion;
use Bank\CommissionTask\Withdrawal;

class WithdrawNaturalTest extends TestCase
{
    private $convert;
    private $withdraw;

    public function setUp()
    {
        $this->convert = new Conversion();
        $this->withdraw = new Withdrawal($this->convert);
    }


    public function testWithdrawNaturalEur()
    {
        $output = [0, 0.7, 0.3, 0.3];
        $data = $this->dataProviderForWithdrawNaturalTesting();
        for($i = 0; $i<sizeof($data); $i++) {
            $commission[$i] = $this->withdraw->withdrawCommission($data[$i]);
            $this->assertEquals($output[$i], $commission[$i], 'Expected: '.$output[$i]. ' Equals: '. $commission[$i]);
        }

    }


    public function dataProviderForWithdrawNaturalTesting(): array
    {
        return [ ['2016-01-06',1,'natural','cash_out',30000,'JPY'],
                ['2016-01-07',1,'natural','cash_out',1000.00,'EUR'],
                ['2016-01-07',1,'natural','cash_out',100.00,'USD'],
                ['2016-01-10',1,'natural','cash_out',100.00,'EUR']
        ];
    }
}
