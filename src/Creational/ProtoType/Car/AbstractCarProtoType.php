<?php

namespace Creational\ProtoType\Car;

abstract class AbstractCarProtoType
{
    protected $model;

    private $flag;

    abstract public function __clone();

    public function getFlag(): mixed
    {
        return $this->flag;
    }

    public function setFlag(mixed $flag): void
    {
        $this->flag = $flag;
    }
}