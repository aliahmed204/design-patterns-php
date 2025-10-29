<?php

namespace Creational\FactoryMethod\Bank;

interface IBank
{
    public function withdraw(float $amount);
    public function getBalance(): float;
}