<?php 

declare(strict_types=1);

namespace Creational\AbstractFactory\Payment\Factories;

use Creational\AbstractFactory\Payment\Contracts\PaymentFactoryInterface;
use Creational\AbstractFactory\Payment\Contracts\PaymentInterface;
use Creational\AbstractFactory\Payment\Contracts\VerificationInterface;
use Creational\AbstractFactory\Payment\Services\MoyasarPayment;
use Creational\AbstractFactory\Payment\Services\MoyasarVerification;

class MoyasarFactory implements PaymentFactoryInterface
{
    public function createPaymentService(): PaymentInterface
    {
        return new MoyasarPayment();
    }

    public function createVerificationService(): VerificationInterface
    {
        return new MoyasarVerification();
    }
}