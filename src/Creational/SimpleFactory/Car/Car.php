<?php

namespace Creational\SimpleFactory\Car;

class Car
{
    public function __construct(
        public string $type,
    ) {}
}