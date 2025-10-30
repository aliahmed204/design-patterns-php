<?php

declare(strict_types=1);

namespace Tests\Unit\Pool;

use Creational\Pool\ExpensiveObject;
use PHPUnit\Framework\TestCase;
use Creational\Pool\ObjectPool;

class ExpensiveObjectTest extends TestCase
{
    private ObjectPool $objectPool;

    public function setUp(): void
    {
        Parent::setUp();
        $this->objectPool = new ObjectPool();
    }

    public function test_it_can_rent_Object(): void
    {
        $myObj = $this->objectPool->get();

        $this->assertInstanceOf(ExpensiveObject::class, $myObj);
        $this->assertEquals(1, $this->objectPool->countInUse());
    }

    public function test_it_can_free_Object(): void
    {
        $myObj = $this->objectPool->get();

        $this->objectPool->relase($myObj);

        $this->assertEquals(1, $this->objectPool->countAvailable());
        $this->assertEquals(0, $this->objectPool->countInUse());
    }

    public function test_it_cannot_create_more_than_max_size(): void
    {
        $this->expectException(\Exception::class);

        $this->objectPool->get();
        $this->objectPool->get();
        $this->objectPool->get(); // max size = 3
        $this->objectPool->get();
    }

}