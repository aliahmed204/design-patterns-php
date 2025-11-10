<?php

namespace Creational\ProtoType\Car;

class ManaualCarProtoType extends AbstractCarProtoType 
{
    protected $model = 'Manual';

    public function __clone()
    {
        
    }
}