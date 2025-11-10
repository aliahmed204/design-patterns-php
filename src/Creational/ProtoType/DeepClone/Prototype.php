<?php

namespace Creational\ProtoType\DeepClone;

interface Prototype
{
    public function deepClone(): Prototype;
}