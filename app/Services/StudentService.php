<?php

namespace App\Services;

use App\Contracts\StudentServiceInterface;
use App\Models\Student;
use Illuminate\Pagination\LengthAwarePaginator;

class StudentService implements StudentServiceInterface
{
    public function list(?array $request = null): LengthAwarePaginator
    {
        return Student::paginate();
    }

    public function show(Student $student): ?Student
    {
        return $student;
    }

    public function create(array $data): Student
    {
        return Student::create($data);
    }

    public function update(Student $student, array $data): bool
    {
        return $student->update($data);
    }

    public function delete(Student $student): bool
    {
        return $student->delete();
    }
}