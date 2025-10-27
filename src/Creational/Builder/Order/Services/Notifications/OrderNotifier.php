<?php

namespace Creational\Builder\Order\Services\Notifications;

class OrderNotifier
{
    public function send(string $customer): bool
    {
        echo "Sending confirmation for order of {$customer}\n";
        
        return true;
    }
}
