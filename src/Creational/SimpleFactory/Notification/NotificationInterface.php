<?php

namespace Creational\SimpleFactory\Notification;

interface NotificationInterface
{
    public function notify(string $to, string $message);
}