<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'excerpt', 'slug', 'category_id', 'tag_id', 'thumbnail'];

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    protected $with = [
        'category',
        'tags'
    ];


    public function scopeFilters(Builder $query, array $filter){

        if(isset($filter['search'])){
            $query->where(fn (Builder $query) => $query
                    ->where('title', 'LIKE', '%' .$filter['search'].'%')
                    ->orwhere('content', 'LIKE', '%'.$filter['search'].'%')
            );
        }

        if(isset($filter['categorie'])){
            $query->where(
                'category_id', $filter['category']->id ?? $filter['category']
            );
        }

        if(isset($filter['tag'])){
            $query->whereRelation(
                'tags','tags.id', $filter['tag']->id ?? $filter['tag']
            );
        }
    }



    public function category():BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }

    public function tags():BelongsToMany{

        return $this->belongsToMany(Tag::class, 'article_tags');
    }


    public function Comments(){
        return $this->hasMany(Comment::class)->latest();
    }

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}
