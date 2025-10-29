<?php

namespace Creational\FactoryMethod\Bank;

class BankAFactory extends IBankFactory
{    
    public function createBank(float $amount = 0) : IBank
    {
        return new BankA($amount);
    }

}