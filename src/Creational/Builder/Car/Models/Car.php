<?php

namespace Creational\Builder\Car\Models;

abstract class Car
{
    protected array $data = [];
    abstract public function setPart(string $name, string|int $value): void;
    public function getParts(): array 
    {
        return $this->data;
    }
}