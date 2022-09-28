<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumberOfFollowUp extends Model
{
    use HasFactory;

    public function followUp()
    {
        return $this->hasMany(Follow_up::class);
    }

    public function student()
    {
        return $this->belongsTo(Follow_up::class);
    }
}
