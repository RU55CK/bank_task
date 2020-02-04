<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';
use Bank\CommissionTask\Account;
use Bank\CommissionTask\Conversion;
use Bank\CommissionTask\Deposit;
use Bank\CommissionTask\Withdrawal;
use Bank\CommissionTask\Config;

$csvFile = file(Config::FILE_NAME);
foreach ($csvFile as $key => $line) {
    $data[] = str_getcsv($line);
    $data[$key][Config::OPERATION_AMOUNT] = (float) $data[$key][Config::OPERATION_AMOUNT];
}

$convert = new Conversion();
$account = new Account();
$deposit = new Deposit($convert);
$withdraw = new Withdrawal($convert);

foreach ($data as $d) {
    if ($d[Config::OPERATION_TYPE] === 'cash_in') {
        $commission = $deposit->depositCommission($d);
    } else {
        $commission = $withdraw->withdrawCommission($d);
    }

    if($d[Config::OPERATION_CURRENCY] === Config::JPY_NAME) {
        echo $commission . PHP_EOL;
    } else {
        echo number_format($commission, 2, '.', ''), PHP_EOL;
    }

}
