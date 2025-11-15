<?php 

namespace Structural\Adapter\Engine;

use Structural\Adapter\Engine\Interfaces\TurboEngineInterface;

/**
 * at some point in project, we wanted to add new engine depnends on diffrenet interface
 */
class TurboEngine implements TurboEngineInterface
{
    public function startTurbo(): string
    {
        return 'Turbo Engine started';
    }
}