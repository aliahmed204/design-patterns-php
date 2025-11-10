<?php

namespace Creational\ProtoType\Product;

// shallow copy - only primitive types are copied and reference types point to the same object
class Product implements Prototype
{
    public function __construct(
        public string $name,
        public float $price,
        public array $attributes = [],
    ) {}

    public function clone() : Product
    {
        return clone $this; 
    }
}