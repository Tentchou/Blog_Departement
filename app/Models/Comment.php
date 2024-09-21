<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $with = ['user'];

    //les champs qui ne sont pas gradess
    protected $fillable = ["content", "article_id", "user_id", "nouvelle_id"];
    //les champs garde

    // protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function nouvelles()
    {
        return $this->belongsTo(Nouvelle::class);
    }
}
