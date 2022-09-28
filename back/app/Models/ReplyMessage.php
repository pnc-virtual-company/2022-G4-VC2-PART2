<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyMessage extends Model
{
    use HasFactory;

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function followUp()
    {
        return $this->belongsTo(Follow_up::class);
    }
}
