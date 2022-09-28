<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Student extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bacth()
    {
        return $this->belongsTo(Batch::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function followUp()
    {
        return $this->hasMany(Follow_up::class);
    }

    public function replyMsg()
    {
        return $this->hasMany(ReplyMessage::class);
    }

    public function numerOfFollowUpStd()
    {
        return $this->hasMany(NumberOfFollowUp::class);
    }

    protected $hidden = [
        'user_id',
        // 'id',
        'batch_id',
        'created_at',
        'updated_at',
    ];
}
