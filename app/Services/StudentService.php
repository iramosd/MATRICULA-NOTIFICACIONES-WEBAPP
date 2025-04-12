<?php

namespace App\Services;

use App\Contracts\StudentServiceInterface;
use App\Models\Student;
use Illuminate\Pagination\LengthAwarePaginator;

class StudentService implements StudentServiceInterface
{
    public function list(?array $request = null, ?array $with = []): LengthAwarePaginator
    {
        if (count($with) > 0) return Student::with($with)->paginate();

        return Student::paginate();
    }

    public function show(Student $student, ?array $with = []): ?Student
    {
        if (count($with) > 0) return $student->load($with);

        return $student;
    }

    public function create(array $data): Student
    {
        return Student::firstOrCreate($data);
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