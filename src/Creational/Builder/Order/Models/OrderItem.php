<?php

namespace Creational\Builder\Order\Models;

class OrderItem
{
    public function __construct(
        public string $name,
        public float $price,
        public int $quantity
    ) {}

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
        ];
    }
}
