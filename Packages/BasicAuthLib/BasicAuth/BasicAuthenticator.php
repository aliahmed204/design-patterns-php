<?php 

namespace BasisAuth;

class BasicAuthenticator
{
    public function authenticate($username, $password)
    {
        return $username . ":". $password;
    }
}