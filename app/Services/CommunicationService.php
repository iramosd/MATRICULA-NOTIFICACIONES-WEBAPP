<?php

namespace App\Services;

use App\Contracts\CommunicationServiceInterface;
use App\Models\Communication;
use App\Models\Course;
use App\Models\Group;
use Illuminate\Pagination\LengthAwarePaginator;

class CommunicationService implements CommunicationServiceInterface
{
    public function list(?array $request = null, ?array $with = []): LengthAwarePaginator
    {
        if (count($with) > 0) return Communication::with($with)->paginate();

        return Communication::paginate();
    }

    public function show(Communication $communication, ?array $with = []): ?Communication
    {
        if (count($with) > 0) return $communication->load($with);

        return $communication;
    }

    public function create(array $data): Communication
    {
        $data['communicable_type'] = $this->getCommunicableType($data['communicable_type']);

        return Communication::create($data);
    }

    public function update(Communication $communication, array $data): bool
    {
        $data['communicable_type'] = $this->getCommunicableType($data['communicable_type']);

        return $communication->update($data);
    }

    public function delete(Communication $communication): bool
    {
        return $communication->delete();
    }

    private function getCommunicableType($communicableType): string
    {
        return match(strtolower($communicableType)) {
            'group' => Group::class,
            'course' => Course::class,
        };
    }
}