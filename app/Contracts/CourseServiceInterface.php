<?php
namespace App\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Student;

interface CourseServiceInterface
{
    public function list(?array $request = null): LengthAwarePaginator;
    public function show(Course $course): ?Course;
    public function create(array $data): Course;
    public function update(Course $course, array $data): bool;
    public function delete(Course $course): bool;
    public function addStudent(Course $course, Student $student): Enrollment;
    public function removeStudent(int $academyId): bool;
}
