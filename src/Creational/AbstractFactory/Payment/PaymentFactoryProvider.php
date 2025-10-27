<?php 

declare(strict_types=1);

namespace Creational\AbstractFactory\Payment;

use Creational\AbstractFactory\Payment\Contracts\PaymentFactoryInterface;
use Creational\AbstractFactory\Payment\Factories\MoyasarFactory;
use Creational\AbstractFactory\Payment\Factories\StripeFactory;
use Exception;

class PaymentFactoryProvider
{
    public static function make(string $gateway): PaymentFactoryInterface
    {
        return match (strtolower($gateway)) {
            'moyasar' => new MoyasarFactory(),
            'stripe'  => new StripeFactory(),
            default => throw new Exception("Unsupported gateway: {$gateway}")
        };
    }
}