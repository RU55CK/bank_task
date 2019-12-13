<?php

namespace Bank\CommissionTask;

interface ConversionInterface
{
    public function convertToEur($conversion): float;
}