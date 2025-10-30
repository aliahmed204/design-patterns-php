<?php

namespace Creational\Pool;

class ExpensiveObject 
{
    public function doWork(): string
    {
        return 'car is moving...';
    }
}