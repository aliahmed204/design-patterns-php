<?php

namespace Creational\SimpleFactory\Notification;

class EmailNotification implements NotificationInterface
{
    public function notify(string $to, string $message)
    {
        return "Sending EMAIL: {$message} TO: {$to}";
    }
}