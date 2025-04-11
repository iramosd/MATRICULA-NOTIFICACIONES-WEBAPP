<?php
namespace App\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Student;

interface StudentServiceInterface
{
    public function list(?array $request = null): LengthAwarePaginator;
    public function show(Student $student): ?Student;
    public function create(array $data): Student;
    public function update(Student $student, array $data): bool;
    public function delete(Student $student): bool;
}