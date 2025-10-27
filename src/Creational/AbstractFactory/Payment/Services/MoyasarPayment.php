<?php 

declare(strict_types=1);

namespace Creational\AbstractFactory\Payment\Services;

use Creational\AbstractFactory\Payment\Contracts\PaymentInterface;

class MoyasarPayment implements PaymentInterface
{
    public function charge(array $order): array
    {
        //
        return ['status' => 'success', 'transaction_id' => 'MOY-' . uniqid(), 'amount' => $order['amount']];
    } 
    public function refund(string $transactionId, float $amount): array
    {
        // 
        return ['status' => 'refunded', 'refund_id' => 'R-' . uniqid(), 'amount' => $amount];
    }
}