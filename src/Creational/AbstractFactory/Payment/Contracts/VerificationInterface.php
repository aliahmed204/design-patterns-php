<?php 

declare(strict_types=1);

namespace Creational\AbstractFactory\Payment\Contracts;

interface VerificationInterface
{
    public function verify(array $payload): bool;
}