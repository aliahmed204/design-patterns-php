<?php 

declare(strict_types=1);

namespace Creational\AbstractFactory\Payment\Services;

use Creational\AbstractFactory\Payment\Contracts\PaymentFactoryInterface;

class PaymentService
{
    protected PaymentFactoryInterface $factory;

    public function __construct(PaymentFactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function charge(array $order): array
    {
        $payment = $this->factory->createPaymentService();
        return $payment->charge($order);
    }

    public function refund(string $txId, float $amount): array
    {
        $payment = $this->factory->createPaymentService();
        return $payment->refund($txId, $amount);
    }

}