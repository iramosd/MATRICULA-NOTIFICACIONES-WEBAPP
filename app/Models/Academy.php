<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Academy extends Model
{
    protected $fillable = [
        'name',
        'description',
        'address',
        'phone',
        'email',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
