<?php

namespace App\Services;

use App\Contracts\GuardianServiceInterface;
use App\Models\Guardian;
use Illuminate\Pagination\LengthAwarePaginator;

class GuardianService implements GuardianServiceInterface
{
    public function list(?array $request = null): LengthAwarePaginator
    {
        return Guardian::paginate();
    }

    public function show(Guardian $guardian): ?Guardian
    {
        return $guardian;
    }

    public function create(array $data): Guardian
    {
        return Guardian::create($data);
    }

    public function update(Guardian $guardian, array $data): bool
    {
        return $guardian->update($data);
    }

    public function delete(Guardian $guardian): bool
    {
        return $guardian->delete();
    }
}