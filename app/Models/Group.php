<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function guardians(): HasMany
    {
        return $this->hasMany(Guardian::class);
    }

    public function communications(): MorphMany
    {
        return $this->morphMany(Communication::class, 'communicable');
    }
}
