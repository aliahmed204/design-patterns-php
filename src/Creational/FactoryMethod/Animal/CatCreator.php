<?php

class CatCreator extends AnimalCreator {
    public function createAnimal(): Animal {
        return new Cat();
    }
}
