<?php

namespace Creational\Pool;

use PhpParser\Node\Expr\Cast\Void_;

class ObjectPool 
{
    private array $available = [];
    private array $inUse = [];
    private int $maxSize = 3;

    public function get(): ExpensiveObject
    {
        if(empty($this->available)){
            if(count($this->inUse) < $this->maxSize){
                $object = new ExpensiveObject();
            }else{
                throw new \Exception("No objects available");
            }
        }else{
            $object = array_pop($this->available);
        }

        $this->inUse[spl_object_hash($object)] = $object;

        return $object;
    }

    public function relase(ExpensiveObject $object): void
    {
        $objectHash = spl_object_hash($object);
        if(isset($this->inUse[$objectHash])){
            unset($this->inUse[$objectHash]);
            $this->available[] = $object;
        }
    }

    public function countAvailable(): int
    {
        return count($this->available);
    }
    public function countInUse(): int
    {
        return count($this->inUse);
    }

    public function objectIsFree(ExpensiveObject $object): bool
    {
        $objectHash = spl_object_hash($object);
        return isset($this->inUse[$objectHash]);
    }
}