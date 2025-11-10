<?php

namespace Creational\ProtoType\Product;

interface Prototype
{
    public function clone(): Prototype;
}