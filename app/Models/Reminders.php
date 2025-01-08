<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reminders extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'reminders';

    protected $fillable = [
        'id',
        'user_id',
        'title',
        'message',
        'schedule_time',
        'status',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
