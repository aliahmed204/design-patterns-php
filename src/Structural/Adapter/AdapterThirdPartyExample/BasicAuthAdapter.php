<?php 

namespace Structural\Adapter\AdapterThirdPartyExample;

use BasisAuth\BasicAuthenticator;

class BasicAuthAdapter implements AuthenticatorInterface
{
    public function __construct(
        private BasicAuthenticator $authenticator
    ){ }
    
    public function login(array $params)
    {
        return $this->authenticator->authenticate($params['username'], $params['password']);
    }
}