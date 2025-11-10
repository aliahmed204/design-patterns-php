<?php

namespace Creational\ProtoType\Product;

class PrototypeRegistry
{
    private array $products = [];

    public function register(string $key, Prototype $prototype): void
    {
        $this->products[$key] = $prototype;
    }

    public function get(string $key): Prototype
    {
        return $this->products[$key]->clone();
    }
}