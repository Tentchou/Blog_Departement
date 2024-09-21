<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['grand_titre_id','title', 'image', 'description', 'petite_description','categorie_project_id'];


    protected $with = [
        'categorieProject',
        'grandTitres'
    ];


    public function scopeFilters(Builder $query, array $filter){

        if(isset($filter['search'])){
            $query->where(fn (Builder $query) => $query
                    ->where('title', 'LIKE', '%' .$filter['search'].'%')
                    ->orwhere('description', 'LIKE', '%'.$filter['search'].'%')
            );
        }

        if(isset($filter['categorie_project'])){
            $query->where(
                'category_project_id', $filter['categorie_project']->id ?? $filter['categorie_project']
            );
        }

        if(isset($filter['grand_titre'])){
            $query->where(
                'grand_titre_id', $filter['grand_titre']->id ?? $filter['grand_titre']
            );
        }

    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            $project->petite_description = implode(' ', array_slice(explode(' ', $project->description), 0, 10));
        });

        static::updating(function ($project) {
            $project->petite_description = implode(' ', array_slice(explode(' ', $project->description), 0, 10));
        });
    }


    public function categorieProject()
    {
        return $this->belongsTo(CategorieProject::class);
    }

    public function grandTitres()
    {
        return $this->belongsTo(GrandTitre::class);
    }


}
