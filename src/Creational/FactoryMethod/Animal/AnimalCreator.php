<?php

abstract class AnimalCreator {
    abstract public function createAnimal(): Animal;

    public function processAnimal(): string {
        $animal = $this->createAnimal();
        return "Processed animal makes sound: " . $animal->makeSound();
    }
}