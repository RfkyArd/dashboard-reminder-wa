<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateMessage extends Model
{
    use HasFactory;
    protected $table = 'template_message';
    protected $fillable = [
        'title', 
        'body', 
        'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
