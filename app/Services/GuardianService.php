<?php

namespace App\Services;

use App\Contracts\GuardianServiceInterface;
use App\Models\Guardian;
use Illuminate\Pagination\LengthAwarePaginator;

class GuardianService implements GuardianServiceInterface
{
    public function list(?array $request = null, ?array $with = []): LengthAwarePaginator
    {
        if (count($with) > 0) return Guardian::with($with)->paginate();

        return Guardian::paginate();
    }

    public function show(Guardian $guardian, ?array $with = []): ?Guardian
    {
        if (count($with) > 0) return $guardian->load($with);

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