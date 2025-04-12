<?php

namespace App\Services;

use App\Contracts\EnrollmentServiceInterface;
use App\Enum\EnrollmentStatusEnum;
use App\Models\Enrollment;
use App\Models\Student;
use Illuminate\Pagination\LengthAwarePaginator;

class EnrollmentService implements EnrollmentServiceInterface
{
    public function list(?array $request = null): LengthAwarePaginator
    {
        return Enrollment::with(['course', 'student'])->paginate();
    }

    public function show(Enrollment | string | int $enrollment, ?array $with = []): ?Enrollment
    {
        if(! $enrollment instanceof Enrollment){
            $enrollment = Enrollment::find($enrollment);
        }

        if (count($with) > 0) return $enrollment->load($with);

        return $enrollment;
    }

    public function create(array $data): Enrollment
    {
        return Enrollment::firstOrCreate([
            'student_id' => $data['student_id'],
            'course_id' => $data['course_id'],
        ], [
            'notes' => $data['notes'] ?? null,
            'status' => $data['status'] ?? EnrollmentStatusEnum::INACTIVE,
        ]);
    }

    public function update(Enrollment $enrollment, array $data): bool
    {
        return $enrollment->update($data);
    }

    public function delete(Enrollment $enrollment): bool
    {
        return $enrollment->delete();
    }

    public function enrollStudent(int | string $courseId, array $studentData):  Enrollment | bool
    {
        $enrollment = null;
        $student = (new StudentService)->create($studentData);
        
        if(! $student instanceof Student) return false;
        
        $enrollment = $this->create([
                'student_id' => $student->id,
                'course_id' => $courseId,
                'status' => EnrollmentStatusEnum::INACTIVE,
            ]);
        
        return $enrollment;
    }
}