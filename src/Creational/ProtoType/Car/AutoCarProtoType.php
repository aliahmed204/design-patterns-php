<?php

namespace Creational\ProtoType\Car;

class AutoCarProtoType extends AbstractCarProtoType
{
    protected $model = 'Auto';

    public function __clone()
    {
        
    }


}