<?php

namespace App\Services;

use App\Contracts\CourseServiceInterface;
use App\Models\Course;
use Illuminate\Pagination\LengthAwarePaginator;

class CourseService implements CourseServiceInterface
{
    public function list(?array $request = null): LengthAwarePaginator
    {
        return Course::paginate();
    }

    public function show(Course $course): ?Course
    {
        return $course;
    }

    public function create(array $data): Course
    {
        return Course::create($data);
    }

    public function update(Course $course, array $data): bool
    {
        return $course->update($data);
    }

    public function delete(Course $course): bool
    {
        return $course->delete();
    }

    public function addStudent(Course $course, Student $student): Enrollment
    {
        return $course->enrollments()->create(['student_id' => $student->id]);
    }

    public function removeStudent(int $academyId): bool
    {
        return $academyId->delete();
    }
    
}