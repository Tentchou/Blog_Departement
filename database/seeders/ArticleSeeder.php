<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorie = Categorie::all();

        //gestion tags
        $tags = Tag::all();

        Article::factory(15)
        ->sequence(fn() =>[
           'category_id'=>$categorie->random(),
        ])
        ->create()
        ->each(fn ($articles) => $articles->tags()->attach($tags->random(rand(0, 3))));
        //
    }
}
