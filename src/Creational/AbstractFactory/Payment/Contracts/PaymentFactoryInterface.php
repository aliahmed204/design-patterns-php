<?php 

declare(strict_types=1);

namespace Creational\AbstractFactory\Payment\Contracts;

interface PaymentFactoryInterface
{
    public function createPaymentService(): PaymentInterface;
    public function createVerificationService(): VerificationInterface;
}