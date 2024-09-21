<?php

namespace App\Models;

use App\Models\CommentNew;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Nouvelle extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'photo', 'demi_description'];

    public function comment_news()
    {
        return $this->hasMany(CommentNew::class)->latest();
    }
      // Générer la demi-description
      public function getDemiDescriptionAttribute()
      {
          return Str::words($this->description, 30);
      }
}
