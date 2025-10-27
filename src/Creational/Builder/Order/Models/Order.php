<?php

namespace Creational\Builder\Order\Models;

class Order
{
    public string $status = 'pending';
    public ?string $customer = null;
    public array $items = [];
    public float $discount = 0;
    public float $total = 0;

    public function addItem(OrderItem $item): void
    {
        $this->items[] = $item;
    }

    public function __toString(): string
    {
        return json_encode([
            'status' => $this->status,
            'customer' => $this->customer,
            'total' => $this->total,
            'discount' => $this->discount,
            'items' => array_map(fn($i) => $i->toArray(), $this->items),
        ], JSON_PRETTY_PRINT);
    }
}
