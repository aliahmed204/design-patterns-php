<?php 

namespace Tests\Unit\Adapter\Engine;

use PHPUnit\Framework\TestCase;
use Structural\Adapter\Engine\Car;
use Structural\Adapter\Engine\EngineAdapter;
use Structural\Adapter\Engine\NormalEngine;
use Structural\Adapter\Engine\TurboEngine;

class EngineAdapterTest extends TestCase
{
    public function test_it_can_start_normal_engine(): void
    {
        $engine = new NormalEngine();
        $car = new Car($engine);

        $this->assertStringContainsString("Normal", (string) $car->start());
    }

    public function test_it_can_start_turbo_engine_with_adaptor(): void
    {
        $adapter = new EngineAdapter(new TurboEngine());
        $car = new Car($adapter);

        $this->assertStringContainsString("Turbo", (string) $car->start());
    }
}