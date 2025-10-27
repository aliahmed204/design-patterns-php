<?php

namespace Creational\Builder\Order\Contracts;

use Creational\Builder\Order\Models\Order;

interface OrderBuilderInterface
{
    public function createOrder(): static;
    public function addCustomer(string $name): static;
    public function addProducts(array $products): static;
    public function applyDiscounts(): static;
    public function calculateTotals(): static;
    public function processPayment(): static;
    public function notify(): static;
    public function getOrder(): Order;
}
