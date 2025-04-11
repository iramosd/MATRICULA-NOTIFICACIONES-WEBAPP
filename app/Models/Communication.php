<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Communication extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'message',
        'sent_date',
        'communicable_id',
        'communicable_type',
    ];

    public function communicable(): MorphTo
    {
        return $this->morphTo();
    }
}
