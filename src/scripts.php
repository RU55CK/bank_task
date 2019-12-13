<?php

require __DIR__.'/../vendor/autoload.php';

$csvFile = file('input.csv');
foreach ($csvFile as $line) {
    $data[] = str_getcsv($line);
}
