<?php
declare(strict_types = 1);

require __DIR__.'/../vendor/autoload.php';
use Bank\CommissionTask\Deposit;
use Bank\CommissionTask\Conversion;

$csvFile = file('input.csv');
foreach ($csvFile as $line) {
    $data[] = str_getcsv($line);
}

$date = new \DateTime('2019-04-20');
for($i = 0; $i < sizeof($data); $i++) {
//    $deposit = new Deposit($date, $data[$i][4], '12', 'assa', '$userType', $data[$i][5]);
//    $conversion = new Conversion($deposit->getOperationCurrency(), $deposit->getOperationAmount());
//    $convert = $conversion->convertToEur($conversion);
//    $commission = $deposit->depositCommission($convert);
//
//    echo ' '.$commission;
}