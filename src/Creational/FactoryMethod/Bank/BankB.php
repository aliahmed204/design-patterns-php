<?php

namespace Creational\FactoryMethod\Bank;

class BankB implements IBank
{
    public function __construct(private float $initialAmount = 0) {}

    public function withdraw(float $amount)
    {
        // Implementation of withdraw method for BankB
        $this->initialAmount -= $amount;
        return 'Withdrawn from BankB...';
    }


    public function getBalance(): float
    {
        // Implementation of getBalance method for BankB
        return $this->initialAmount;
    }
}