<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laboratoire extends Model
{
    use HasFactory;

    public function activites()
    {
        return $this->hasMany(Activite::class);
    }
}
