<?php

namespace Tests\Unit\Adapter;

use PHPUnit\Framework\MockObject\MockBuilder;
use PHPUnit\Framework\TestCase;
use Structural\Adapter\AdapterThirdPartyExample\BasicAuthAdapter;
use Structural\Adapter\AdapterThirdPartyExample\TokenAuthAdapter;
use Structural\Adapter\AdapterThirdPartyExample\UserLogin;

class AdapterThirdPartyExampleTest extends TestCase
{
    /**
     * Don't Mock What You Don't Own
     */
    
    public function test_it_can_auth_with_BasicAuthLib()
    {
        $basicAuthAdapter = $this->createMock(BasicAuthAdapter::class);
        $basicAuthAdapter->expects($this->once())
            ->method('login')
            ->with($this->equalTo(['username' => 'user', 'password' => 'password'])) 
            ->willReturn(true);

        $userLogin = new UserLogin($basicAuthAdapter);
        
        $result = $userLogin->login(['username' => 'user', 'password' => 'password']);

        $this->assertTrue($result);
    }

    public function test_it_can_auth_with_TokenAuthLib()
    {
        $tokenAuthAdapter = $this->createMock(TokenAuthAdapter::class);
        $tokenAuthAdapter->expects($this->once())
            ->method('login')
            ->with($this->equalTo(['key' => 'user@user', 'token' => 'token'])) 
            ->willReturn(true);

        $userLogin = new UserLogin($tokenAuthAdapter);
        
        $result = $userLogin->login(['key' => 'user@user', 'token' => 'token']);

        $this->assertTrue($result);
    }


}