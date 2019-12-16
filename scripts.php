<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';
use Bank\CommissionTask\Account;
use Bank\CommissionTask\Conversion;
use Bank\CommissionTask\Deposit;
use Bank\CommissionTask\Withdrawal;

$csvFile = file('input.csv');
foreach ($csvFile as $line) {
    $data[] = str_getcsv($line);
}

$convert = new Conversion();
$account = new Account();
$deposit = new Deposit($convert);
$withdraw = new Withdrawal($convert);

foreach ($data as $d) {
    if ($d[3] === 'cash_in') {
        $commission = $deposit->depositCommission($d);
    } else {
        $commission = $withdraw->withdrawCommission($d);
    }

    echo number_format((float) $commission, 2, '.', ''), PHP_EOL;
}
