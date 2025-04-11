<?php

namespace App\Services;

use App\Contracts\EnrollmentServiceInterface;
use App\Models\Enrollment;
use Illuminate\Pagination\LengthAwarePaginator;

class EnrollmentService implements EnrollmentServiceInterface
{
    public function list(?array $request = null): LengthAwarePaginator
    {
        return Enrollment::with(['course', 'student'])->paginate();
    }

    public function show(Enrollment $enrollment, ?array $with = []): ?Enrollment
    {
        if (count($with) > 0) return $enrollment->load($with);

        return $enrollment;
    }

    public function create(array $data): Enrollment
    {
        return Enrollment::create($data);
    }

    public function update(Enrollment $enrollment, array $data): bool
    {
        return $enrollment->update($data);
    }

    public function delete(Enrollment $enrollment): bool
    {
        return $enrollment->delete();
    }
}