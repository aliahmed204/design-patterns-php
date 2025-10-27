<?php

declare(strict_types=1);

namespace tests\unit\Builders;

use Creational\Builder\Order\Builders\OfflineOrderBuilder;
use Creational\Builder\Order\Builders\OnlineOrderBuilder;
use Creational\Builder\Order\Models\Order;
use Creational\Builder\Order\OrderDirector;
use Creational\Builder\Order\Services\Notifications\OrderNotifier;
use Creational\Builder\Order\Services\Payments\CashOnDeliveryService;
use Creational\Builder\Order\Services\Payments\PaymobPaymentService;
use PHPUnit\Framework\TestCase;

class OrderBuilderTest extends TestCase
{
    public function test_online_order_builder_creates_order_successfully(): void
    {
        // Arrange
        $builder = new OnlineOrderBuilder(
            new PaymobPaymentService(),
            new OrderNotifier()
        );

        // Act
        $director = new OrderDirector($builder);
        $order = $director->buildOrder(
            'Ali Ahmed',
            [
                ['name' => 'iPhone 15', 'price' => 40000, 'quantity' => 1],
                ['name' => 'AirPods', 'price' => 1000, 'quantity' => 2],
            ]
        );

        // Assert
        $this->assertInstanceOf(Order::class, $order);
        $this->assertEquals('Ali Ahmed', $order->customer);
        $this->assertEquals(41990, $order->total); // (40000 + 2*1000) - 10
        $this->assertEquals('pending', $order->status);
    }

    public function test_offline_order_builder_creates_order_successfully(): void
    {
        // Arrange
        $builder = new OfflineOrderBuilder(
            new CashOnDeliveryService(),
            new OrderNotifier()
        );

        // Act
        $director = new OrderDirector($builder);
        $order = $director->buildOrder(
            'Mohamed Ali',
            [
                ['name' => 'Samsung Galaxy S23', 'price' => 30000, 'quantity' => 1],
                ['name' => 'Galaxy Buds', 'price' => 1500, 'quantity' => 2],
            ]
        );

        // Assert
        $this->assertInstanceOf(Order::class, $order);
        $this->assertEquals('Mohamed Ali', $order->customer);
        $this->assertEquals(32980, $order->total); // (30000 + 2*1500) - 20
        $this->assertEquals('pending', $order->status);
    }

    public function test_online_order_builder_with_mocked_services(): void
    {
        // Arrange
        $mockPayment = $this->createMock(PaymobPaymentService::class);
        $mockPayment->expects($this->once())
            ->method('charge')
            ->with(41990)
            ->willReturn(true);

        $mockNotifier = $this->createMock(OrderNotifier::class);
        $mockNotifier->expects($this->once())
            ->method('send')
            ->with('Ali Ahmed')
            ->willReturn(true);

        $builder = new OnlineOrderBuilder($mockPayment, $mockNotifier);
        $director = new OrderDirector($builder);

        // Act
        $order = $director->buildOrder(
            'Ali Ahmed',
            [
                ['name' => 'iPhone 15', 'price' => 40000, 'quantity' => 1],
                ['name' => 'AirPods', 'price' => 1000, 'quantity' => 2],
            ]
        );

        // Assert
        $this->assertInstanceOf(Order::class, $order);
        $this->assertEquals('Ali Ahmed', $order->customer);
        $this->assertEquals(41990, $order->total); // (40000 + 2*1000) - 10
        $this->assertEquals('pending', $order->status);
    }
}