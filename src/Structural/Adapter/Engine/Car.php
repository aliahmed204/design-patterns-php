<?php 

namespace Structural\Adapter\Engine;

use Structural\Adapter\Engine\Interfaces\EngineInterface;
use Structural\Adapter\Engine\EngineAdapter;

require_once 'vendor/autoload.php';

class Car implements EngineInterface
{
    public function __construct(
        private EngineInterface $engine
    ) {}


    public function start(): string
    {
        return $this->engine->start();
    }
}

$normalEngine = new NormalEngine();
$car = new Car($normalEngine);

echo 'first car: ' . $car->start() . PHP_EOL;

$turboEngine = new TurboEngine();
$enginAdapter = new EngineAdapter($turboEngine);
$carWithTruboEngine = new Car($enginAdapter);

echo 'trubo car: '. $carWithTruboEngine->start() . PHP_EOL;