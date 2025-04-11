<?php
namespace App\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Enrollment;

interface EnrollmentServiceInterface
{
    public function list(?array $request = null): LengthAwarePaginator;
    public function show(Enrollment $enrollment): ?Enrollment;
    public function create(array $data): Enrollment;
    public function update(Enrollment $enrollment, array $data): bool;
    public function delete(Enrollment $enrollment): bool;
}