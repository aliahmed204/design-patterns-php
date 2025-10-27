<?php

namespace Creational\Builder\Order;

use Creational\Builder\Order\Contracts\OrderBuilderInterface as ContractsOrderBuilderInterface;
use Creational\Builder\Order\Models\Order;

class OrderDirector
{
    public function __construct(private ContractsOrderBuilderInterface $builder) {}

    public function buildOrder(string $customer, array $products): Order
    {
        $this->builder->createOrder()
            ->addCustomer($customer)
            ->addProducts($products)
            ->applyDiscounts()
            ->calculateTotals()
            ->processPayment()
            ->notify();

        return $this->builder->getOrder();
    }
}
