<?php 

namespace Structural\Adapter\Engine;

use Structural\Adapter\Engine\Interfaces\EngineInterface;
use Structural\Adapter\Engine\TurboEngine;

class EngineAdapter implements EngineInterface
{
    protected TurboEngine $adaptor;

    public function __construct(TurboEngine $adaptor)
    {
        $this->adaptor = $adaptor;
    }

    /**
     * basic interface implementation
     */
    public function start(): string
    {
        return $this->adaptor->startTurbo();
    }
}