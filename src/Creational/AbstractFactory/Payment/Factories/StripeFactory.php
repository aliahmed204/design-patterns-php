<?php 

declare(strict_types=1);

namespace Creational\AbstractFactory\Payment\Factories;

use Creational\AbstractFactory\Payment\Contracts\PaymentFactoryInterface;
use Creational\AbstractFactory\Payment\Contracts\PaymentInterface;
use Creational\AbstractFactory\Payment\Contracts\VerificationInterface;
use Creational\AbstractFactory\Payment\Services\StripePayment;
use Creational\AbstractFactory\Payment\Services\StripeVerification;

class StripeFactory implements PaymentFactoryInterface
{
    public function createPaymentService(): PaymentInterface
    {
        return new StripePayment();
    }
    public function createVerificationService(): VerificationInterface
    {
        return new StripeVerification();
    }
}