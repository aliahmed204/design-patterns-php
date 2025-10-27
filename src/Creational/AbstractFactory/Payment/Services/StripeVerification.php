<?php 

declare(strict_types=1);

namespace Creational\AbstractFactory\Payment\Services;

use Creational\AbstractFactory\Payment\Contracts\VerificationInterface;

class StripeVerification implements VerificationInterface
{
    public function verify(array $payload): bool
    {
        // تحقق من الـ signature أو الحالة المرسلة من Stripe
        return isset($payload['signature']);
    }
}