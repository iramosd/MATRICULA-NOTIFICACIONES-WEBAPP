<?php

namespace App\Services;

use App\Contracts\PaymentServiceInterface;
use App\Models\Payment;
use Illuminate\Pagination\LengthAwarePaginator;

class PaymentService implements PaymentServiceInterface
{
    public function list(?array $request = null): LengthAwarePaginator
    {
        return Payment::paginate();
    }

    public function show(Payment $payment): ?Payment
    {
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