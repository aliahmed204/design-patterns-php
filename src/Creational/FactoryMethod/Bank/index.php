<?php

require_once 'vendor/autoload.php';

use Creational\FactoryMethod\Bank\BankAFactory;
use Creational\FactoryMethod\Bank\BankBFactory;

try {
    $bankAFactory = new BankAFactory();
    $bankA = $bankAFactory->createBank(1000);
    echo $bankA->withdraw(500) . "\n" .'new balance = ' . $bankA->getBalance() . "\n\n";
    
    $bankBFactory = new BankBFactory();
    $bankB = $bankBFactory->createBank(1450);
    echo $bankB->withdraw(250) . "\n" .'new balance = ' . $bankB->getBalance();
    
} catch (Exception $e) {
    echo 'Exception : ' . $e->getMessage();
}