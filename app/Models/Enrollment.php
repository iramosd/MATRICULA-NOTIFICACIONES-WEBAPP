<?php

namespace App\Models;

use App\Enum\EnrollmentStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Enrollment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'student_id',
        'course_id',
        'notes',
        'status',
    ];

    protected $casts = [
        'status' => EnrollmentStatusEnum::class
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

}
