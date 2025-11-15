<?php 

namespace Structural\Adapter\AdapterThirdPartyExample;

interface AuthenticatorInterface
{
    public function login(array $params);
}