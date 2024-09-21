<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GrandTitre extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
