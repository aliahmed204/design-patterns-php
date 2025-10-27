<?php

namespace Creational\Builder\Car;

use Creational\Builder\Car\Models\Car;

/**
 * Builder interface for constructing Car instances.
 *
 * Implementations are responsible for creating a Car and adding its parts
 * (engine, doors, body, wheels) before returning the completed Car via getCar().
 */
interface CarBuilderInterface
{
    public  function  createCar();
    public  function  addEngine();
    public  function  addDoors();
    public  function  addBody();
    public  function  addWheel();
    public  function  getCar(): Car;
}