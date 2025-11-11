<?php

namespace Creational\SimpleFactory\Notification;

class SMSNotification implements NotificationInterface
{
    public function notify(string $to, string $message)
    {
        return "Sending SMS: {$message} TO: {$to}";
    }
}