<?php

namespace Structural\Bridge\Car;

class RedColor implements Color
{
    public function applyColor(): string
    {
        return "Red";
    }
}