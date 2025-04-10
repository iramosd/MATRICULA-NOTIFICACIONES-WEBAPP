<?php

namespace App\Enum;

enum PaymentMethodEnum: string
{
    case EFECTIVO = 'efectivo';
    case TRANSFERENCIA = 'transferencia';

    static function getValues(): array
    {
        return array_map(fn($payment_method) => $payment_method->value, PaymentMethodEnum::cases());
    }
}

