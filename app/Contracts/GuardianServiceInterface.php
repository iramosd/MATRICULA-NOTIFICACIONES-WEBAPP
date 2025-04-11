<?php
namespace App\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Guardian;

interface GuardianServiceInterface
{
    public function list(?array $request = null): LengthAwarePaginator;
    public function show(Guardian $guardian): ?Guardian;
    public function create(array $data): Guardian;
    public function update(Guardian $guardian, array $data): bool;
    public function delete(Guardian $guardian): bool;
}