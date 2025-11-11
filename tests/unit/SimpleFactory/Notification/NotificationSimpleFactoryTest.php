<?php

namespace Tests\Unit\SimpleFactory\Notification;

use Creational\SimpleFactory\Notification\EmailNotification;
use Creational\SimpleFactory\Notification\NotificationFactory;
use Creational\SimpleFactory\Notification\SMSNotification;
use Exception;
use PHPUnit\Framework\TestCase;

class NotificationSimpleFactoryTest extends TestCase
{
    protected NotificationFactory $factory;

    public function setUp(): void
    {
        Parent::setUp();
        $this->factory = new NotificationFactory();
    }

    public function test_it_can_create_email_notification(): void
    {
        $emailNotification = $this->factory->create("email");
        
        $this->assertInstanceOf(EmailNotification::class, $emailNotification);
    }

    public function test_it_can_create_sms_notification(): void
    {
        $smsNotification = $this->factory->create("sms");

        $this->assertInstanceOf(SMSNotification::class, $smsNotification);
    }

    public function test_invalid_type_throws_exception()
    {
        $this->expectException(Exception::class);

        $this->factory->create('fax');
    }

    public function test_it_can_send_email_notification(): void
    {
        $to = 'aliahmed@gmail.com';
        $message = 'Hello World';

        $emailNotification = $this->factory->create("email");
        $expected = "Sending EMAIL: {$message} TO: {$to}";

        $result = $emailNotification->notify($to, $message);

        $this->assertStringContainsString('EMAIL', $result);
        $this->assertEquals($expected, $result);
    }

    public function test_it_can_send_sms_notification(): void
    {
        $to = '+1234567890';
        $message = 'Hello @User Your code: #12345';

        $emailNotification = $this->factory->create("sms");
        $expected = "Sending SMS: {$message} TO: {$to}";

        $result = $emailNotification->notify($to, $message);

        $this->assertStringContainsString('SMS', $result);
        $this->assertEquals($expected, $result);
    }

}