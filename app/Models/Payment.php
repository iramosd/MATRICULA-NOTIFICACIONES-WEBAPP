<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
        'method',
        'amount',
        'payment_date',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        'payment_date' => 'date',
    ];
    
    public function enrollment(): BelongsTo
    {
        return $this->belongsTo(Enrollment::class);
    }
    
}
