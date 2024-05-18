<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flag extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'flagged_by',
        'flag_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function flaggedBy()
    {
        return $this->belongsTo(User::class, 'flagged_by');
    }
}
