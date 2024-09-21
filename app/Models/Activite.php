<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activite extends Model
{
    use HasFactory;


    protected $fillable = ['title', 'description', 'image', 'groupe_id'];

    public function laboratoires()
    {
        return $this->belongsTo(Laboratoire::class);
    }
}
