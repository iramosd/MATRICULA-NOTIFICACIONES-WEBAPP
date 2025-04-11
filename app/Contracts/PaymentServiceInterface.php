<?php
namespace App\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Payment;

interface PaymentServiceInterface
{
    public function list(?array $request = null): LengthAwarePaginator;
    public function show(Payment $payment): ?Payment;
    public function create(array $data): Payment;
    public function update(Payment $payment, array $data): bool;
    public function delete(Payment $payment): bool;
}