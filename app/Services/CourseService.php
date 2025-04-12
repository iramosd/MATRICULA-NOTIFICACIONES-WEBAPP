<?php

namespace App\Services;

use App\Contracts\CourseServiceInterface;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class CourseService implements CourseServiceInterface
{
    public function list(?array $request = null, ?array $with = []): LengthAwarePaginator
    {
        if (count($with) > 0) return Course::with($with)->paginate();

        return Course::paginate();
    }

    public function show(Course | string | int $course, ?array $with = []): ?Course
    {
        if(! $course instanceof Course){
            $course = Course::find($course);
        }

        if (count($with) > 0) return $course->load($with);
        
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

    public function addStudent(Course $course, Student $student): bool
    {
        return true;
    }

    public function removeStudent(int $academyId): bool
    {
        return true;
    }

    public function listByColumns(array $columnNames, bool $isPaginated = false): Collection | LengthAwarePaginator
    {
        $query = Course::select($columnNames);

        if($isPaginated) return $query->paginate();

        return $query->get();
    }
    
}