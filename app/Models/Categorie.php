<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    public function articles():HasMany
    {
        return $this->hasMany(Article::class, 'category_id');
    }

    //gerer le nombre de articles par post
    public function getArticleCountAttribute(){
        return $this->articles()->count();
    }
}
