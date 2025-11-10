<?php

namespace Creational\ProtoType\DeepClone;

// عاوز اقول انه مش افضل حاجة مع البروتوتايب استخدام ال deep clone
/**
 * Perform a deep clone of the product.
 * Note: deep cloning (recursively cloning all referenced objects)
 * is generally not recommended with the Prototype pattern because
 * it couples cloning logic to the object graph structure.
 */

class Product implements Prototype
{
    public function __construct(
        public string $name,
        public float $price,
        public Category $category,
    ) {}

    public function deepClone(): Prototype
    {
        $clone = clone $this;
        $clone->category = clone $this->category;

        return $clone;
    }
}