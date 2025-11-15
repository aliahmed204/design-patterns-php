<?php 

namespace Structural\Adapter\AdapterThirdPartyExample;

use TokenAuth\TokenAuthenticator;

class TokenAuthAdapter implements AuthenticatorInterface
{
    public function __construct(
      private TokenAuthenticator $authenticator
    ){ }

    public function login(array $params)
    {
        return $this->authenticator->tokenLogin($params["key"], $params['token']);
    }
}