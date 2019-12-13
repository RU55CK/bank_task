<?php

namespace Bank\CommissionTask;

interface OperationInterface {

    public function depositCommission($operation): float;
    public function withdraw($operation): void;
}