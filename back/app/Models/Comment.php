<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function followUp()
    {
        return $this->belongsTo(Follow_up::class);
    }

    public function replyMsg()
    {
        return $this->hasMany(ReplyMessage::class);
    }
}
