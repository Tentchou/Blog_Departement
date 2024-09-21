<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorie = collect(['Livres', 'Recherches', 'Evenements','Nouveautes']);

        $categorie->each(fn($category)=>Categorie::create([
            'name'=>$category,
            'slug'=>Str::slug($category)
        ]));
        //
    }
}
