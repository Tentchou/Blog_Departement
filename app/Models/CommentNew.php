<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommentNew extends Model
{
    use HasFactory;

    protected $with = ['user'];

    //les champs qui ne sont pas gradess
    protected $fillable = ["content", "user_id", "nouvelle_id"];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function nouvelles()
    {
        return $this->belongsTo(Nouvelle::class);
    }
}
