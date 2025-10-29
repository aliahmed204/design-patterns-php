<?php

namespace Creational\FactoryMethod\Bank;

abstract class IBankFactory
{
    abstract public function createBank(float $amount = 0): IBank;
    
    public function processBank(float $amount = 0) {
        $bank = $this->createBank($amount);

        $bank->withdraw($amount);
        return $bank;
    }
}