<?php

class DogCreator extends AnimalCreator {
    public function createAnimal(): Animal {
        return new Dog();
    }
}
