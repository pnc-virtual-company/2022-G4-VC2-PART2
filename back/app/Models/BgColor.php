<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BgColor extends Model
{
    use HasFactory;

    public function followUp()
    {
        return $this->hasMany(Follow_up::class);
    }
}
