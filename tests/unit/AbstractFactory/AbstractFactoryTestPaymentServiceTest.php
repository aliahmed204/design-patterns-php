<?php

declare(strict_types=1);

namespace tests\unit\AbstractFactory;

use Creational\AbstractFactory\Payment\Factories\MoyasarFactory;
use PHPUnit\Framework\TestCase;
use Creational\AbstractFactory\Payment\Services\PaymentService;
use Creational\AbstractFactory\Payment\Contracts\PaymentFactoryInterface;
use Creational\AbstractFactory\Payment\Contracts\PaymentInterface;
use Creational\AbstractFactory\Payment\Factories\StripeFactory;
use Creational\AbstractFactory\Payment\PaymentFactoryProvider;
use Exception;

final class AbstractFactoryTestPaymentServiceTest extends TestCase
{
    public function test_it_returns_moyasar_factory(): void
    {
        $factory = PaymentFactoryProvider::make('moyasar');
        $this->assertInstanceOf(MoyasarFactory::class, $factory);
    }

    public function test_it_returns_stripe_factory(): void
    {
        $factory = PaymentFactoryProvider::make('stripe');
        $this->assertInstanceOf(StripeFactory::class, $factory);
    }

    public function test_it_throws_exception_for_unsupported_gateway(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Unsupported gateway: paypal');

        PaymentFactoryProvider::make('paypal');
    }

    public function test_it_can_perform_full_payment_flow_with_moyasar(): void
    {
        // Arrange
        $factory = PaymentFactoryProvider::make('moyasar');
        $paymentService = new PaymentService($factory);
        $order = [
            'amount' => 200.00,
            'currency' => 'EGY',
            'description' => 'Test order end-to-end',
        ];

        // Act
        $chargeResponse = $paymentService->charge($order);
        $refund = $paymentService->refund($chargeResponse['transaction_id'], 100.00);

        // Assert
        $this->assertEquals('success', $chargeResponse['status']);
        $this->assertEquals(200.00, $chargeResponse['amount']);
        $this->assertStringStartsWith('MOY-', $chargeResponse['transaction_id']);

        $this->assertEquals('refunded', $refund['status']);
        $this->assertEquals(100.00, $refund['amount']);
        $this->assertStringStartsWith('R-', $refund['refund_id']);

        $verification = $factory->createVerificationService();

        $validPayload = ['signature' => 'abc123'];
        $this->assertTrue($verification->verify($validPayload));

        $invalidPayload = ['no_signature' => true];
        $this->assertFalse($verification->verify($invalidPayload));

    }

    public function test_it_charges_order_using_mocked_payment_service(): void
    {
        // Arrange
        $mockPayment = $this->createMock(PaymentInterface::class);
        $mockPayment->expects($this->once())
            ->method('charge')
            ->willReturn(['status' => 'success', 'transaction_id' => 'MOCK-TX-123', 'amount' => 200.00]);

        $mockFactory = $this->createMock(PaymentFactoryInterface::class);
        $mockFactory->expects($this->once())
            ->method('createPaymentService')
            ->willReturn($mockPayment);

        $service = new PaymentService($mockFactory);

        // Act
        $result = $service->charge(['amount' => 200.00]);

        // Assert
        $this->assertEquals('success', $result['status']);
        $this->assertEquals('MOCK-TX-123', $result['transaction_id']);
        $this->assertEquals('200', $result['amount']);
    }

    public function test_it_refunds_transaction_using_mocked_payment_service(): void
    {
        // Arrange
        $mockPayment = $this->createMock(PaymentInterface::class);
        $mockPayment ->expects($this->once())
            ->method('refund')
            ->with('TX-001', 50.00)
            ->willReturn(['status' => 'refunded', 'refund_id' => 'R-MOCK-1']);

        $mockFactory = $this->createMock(PaymentFactoryInterface::class);
        $mockFactory->expects($this->once())
            ->method('createPaymentService')
            ->willReturn($mockPayment);

        $service = new PaymentService($mockFactory);

        // Act
        $result = $service->refund('TX-001', 50.00);

        // Assert
        $this->assertEquals('refunded', $result['status']);
        $this->assertEquals('R-MOCK-1', $result['refund_id']);   
    }

}