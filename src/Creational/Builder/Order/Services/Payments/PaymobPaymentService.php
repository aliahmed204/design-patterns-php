<?php

namespace Creational\Builder\Order\Services\Payments;

class PaymobPaymentService
{
    public function charge(float $amount): bool
    {
        echo "Processing Moyasar payment of {$amount} ...\n";

        return true;
    }
}
