<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MessageLogs extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'message_logs';

    protected $fillable = [
        'reminder_id',
        'user_id',
        'status',
        'sent_at',
        'response',
    ];

    protected $casts = [
        'sent_at' => 'datetime',
    ];

    public function reminder()
    {
        return $this->belongsTo(Reminders::class, 'reminder_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
