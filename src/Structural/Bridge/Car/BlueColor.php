<?php

namespace Structural\Bridge\Car;

class BlueColor implements Color
{
    public function applyColor(): string
    {
        return "Blue";
    }
}