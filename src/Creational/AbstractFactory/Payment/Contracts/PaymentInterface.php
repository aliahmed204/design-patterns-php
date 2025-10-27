<?php 

declare(strict_types=1);

namespace Creational\AbstractFactory\Payment\Contracts;

interface PaymentInterface
{
    public function charge(array $order): array; 
    public function refund(string $transactionId, float $amount): array;
}