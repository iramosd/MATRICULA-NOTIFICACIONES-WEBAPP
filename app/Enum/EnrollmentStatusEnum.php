<?php

namespace App\Enum;

enum EnrollmentStatusEnum: string
{
    CASE ACTIVE = 'activo';
    CASE INACTIVE = 'inactivo';

    static function getValues(): array
    {
        return array_map(fn($payment_method) => $payment_method->value, PaymentMethodEnum::cases());
    }
}
