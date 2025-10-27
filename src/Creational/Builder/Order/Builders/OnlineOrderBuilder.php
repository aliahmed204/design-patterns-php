<?php

namespace Creational\Builder\Order\Builders;

use Creational\Builder\Order\Contracts\OrderBuilderInterface;
use Creational\Builder\Order\Models\Order;
use Creational\Builder\Order\Models\OrderItem;
use Creational\Builder\Order\Services\Notifications\OrderNotifier;
use Creational\Builder\Order\Services\Payments\PaymobPaymentService;

class OnlineOrderBuilder implements OrderBuilderInterface
{
    private Order $order;

    public function __construct(
        private PaymobPaymentService $payment,
        private OrderNotifier $notifier
    ) {}

    public function createOrder(): static
    {
        $this->order = new Order();

        return $this;
    }

    public function addCustomer(string $name): static
    {
        $this->order->customer = $name;

        return $this;
    }

    public function addProducts(array $products): static
    {
        foreach ($products as $p) {
            $this->order->addItem(new OrderItem($p['name'], $p['price'], $p['quantity']));
        }

        return $this;
    }

    public function applyDiscounts(): static
    {
        $this->order->discount = 10; // example fixed discount

        return $this;
    }

    public function calculateTotals(): static
    {
        $subtotal = 0;
        foreach ($this->order->items as $item) {
            $subtotal += $item->price * $item->quantity;
        }
        $this->order->total = $subtotal - $this->order->discount;

        return $this;
    }

    public function processPayment(): static
    {
        $this->payment->charge($this->order->total);

        return $this;
    }

    public function notify(): static
    {
        $this->notifier->send($this->order->customer);

        return $this;
    }

    public function getOrder(): Order
    {
        return $this->order;
    }
}
