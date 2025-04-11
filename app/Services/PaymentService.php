<?php

namespace App\Services;

use App\Contracts\PaymentServiceInterface;
use App\Models\Payment;
use Illuminate\Pagination\LengthAwarePaginator;

class PaymentService implements PaymentServiceInterface
{
    public function list(?array $request = null, ?array $with = []): LengthAwarePaginator
    {
        if (count($with) > 0) return Payment::with($with)->paginate();

        return Payment::paginate();
    }

    public function show(Payment $payment, ?array $with = []): ?Payment
    {
        if (count($with) > 0) return $payment->load($with);

        return $payment;
    }

    public function create(array $data): Payment
    {
        return Payment::create($data);
    }

    public function update(Payment $payment, array $data): bool
    {
        return $payment->update($data);
    }

    public function delete(Payment $payment): bool
    {
        return $payment->delete();
    }
}