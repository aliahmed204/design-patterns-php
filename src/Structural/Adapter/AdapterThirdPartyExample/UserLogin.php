<?php 

namespace Structural\Adapter\AdapterThirdPartyExample;

class UserLogin
{
    public function __construct(
        private AuthenticatorInterface $authenticator
    ) {}

    public function login(array $params)
    {
        return $this->authenticator->login($params);
    }
}