<?php

namespace App\Services;

use App\Contracts\CommunicationServiceInterface;
use App\Models\Communication;
use Illuminate\Pagination\LengthAwarePaginator;

class CommunicationService implements CommunicationServiceInterface
{
    public function list(?array $request = null): LengthAwarePaginator
    {
        return Communication::paginate();
    }

    public function show(Communication $communication): ?Communication
    {
        return $communication;
    }

    public function create(array $data): Communication
    {
        return Communication::create($data);
    }

    public function update(Communication $communication, array $data): bool
    {
        return $communication->update($data);
    }

    public function delete(Communication $communication): bool
    {
        return $communication->delete();
    }
}