<?php

namespace Creational\FactoryMethod\Bank;

class BankA implements IBank
{
    public function __construct(private float $initialAmount = 0) {}

    public function withdraw(float $amount)
    {
        // Implementation of withdraw method for BankA
        $this->initialAmount -= $amount;
        return 'Withdrawn from BankA...';
    }

    public function getBalance(): float
    {
        // Implementation of getBalance method for BankA
        return $this->initialAmount;
    }
}