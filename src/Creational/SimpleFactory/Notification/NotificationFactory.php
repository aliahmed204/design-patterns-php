<?php

namespace Creational\SimpleFactory\Notification;

class NotificationFactory
{
    public function create(string $type): NotificationInterface
    {
        return match ($type){
            'email' => new EmailNotification(),
            'sms'   => new SMSNotification(),
            default => throw new \InvalidArgumentException('Invalid notification type'),
        };
    }
}