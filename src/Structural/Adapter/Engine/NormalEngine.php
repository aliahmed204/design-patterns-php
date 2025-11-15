<?php 

namespace Structural\Adapter\Engine;

use Structural\Adapter\Engine\Interfaces\EngineInterface;

/**
 * first way to create engine
 */
class NormalEngine implements EngineInterface
{
    public function start(): string
    {
        return 'Normal Engine started';
    }
}