<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow_up extends Model
{
    use HasFactory;

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function replyMsg()
    {
        return $this->hasMany(ReplyMessage::class);
    }

    public function numerOfFollowUpStd()
    {
        return $this->belongsTo(Follow_up::class);
    }

}
