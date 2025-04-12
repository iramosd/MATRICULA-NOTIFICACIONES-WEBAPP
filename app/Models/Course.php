<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'name',
        'description',
        'cost',
        'duration',
        'image',
        'modality',
        'academy_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function academy(): BelongsTo
    {
        return $this->belongsTo(Academy::class);
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, Enrollment::class)
            ->withPivot('notes')
            ->withTimestamps(); 
    }

    public function communications(): MorphMany
    {
        return $this->morphMany(Communication::class, 'communicable');
    }
    
}