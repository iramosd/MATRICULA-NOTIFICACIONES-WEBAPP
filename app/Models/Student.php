<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'first_name',
        'last_name',
        'birth_date',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];
    
    public function guardian(): BelongsTo
    {
        return $this->belongsTo(Guardian::class);
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, Enrollment::class)
            ->withPivot('notes')
            ->withTimestamps();
    }
}
