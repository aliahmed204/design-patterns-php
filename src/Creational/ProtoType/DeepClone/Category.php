<?php

namespace Creational\ProtoType\DeepClone;

class Category
{
    public function __construct(
        public string $name,
        public string $description,
        public array $tags,
    ) {}
}