<?php

namespace Creational\FactoryMethod\Bank;

class BankBFactory extends IBankFactory
{
    public function createBank(float $amount = 0) : IBank
    {
        return new BankB($amount);
    }
}