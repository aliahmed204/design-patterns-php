<?php

namespace Creational\Singleton\SingleThread;

// single thread [code -> proccessor]
class Counter
{
    private int $counter = 0;
    private static ?Counter $instance = null;

    private function __construct(){}

    // Lazy initailization
    public static function getInstance(): Counter
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function increment(): void
    {
        $this->counter++;
    }

    public function getCount(): int
    {
        return $this->counter;
    }
}

$obj1 = Counter::getInstance();
$obj2 = Counter::getInstance();

$obj1->increment();
echo "Counter 1 :" . $obj1->getCount() . " Counter 2 :" . $obj2->getCount() . "\n"; 

$obj2->increment();
echo "Counter 1 :" . $obj1->getCount() . " Counter 2 :" . $obj2->getCount() . "\n"; 

$obj1->increment();
echo "Counter 1 :" . $obj1->getCount() . " Counter 2 :" . $obj2->getCount(); 