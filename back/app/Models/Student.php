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
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
