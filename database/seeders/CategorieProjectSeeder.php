<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategorieProject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorieProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categorie = collect(['Analyse', 'Algebre', 'Geometrie','Théorie des nombres','Recherche opérationnelle',
    'Mathématiques appliquées','statistiques', 'probabilite', 'Data science','Théorie des nombres','securite informatique',
'Base de donnee', 'Genie logiciel', 'Developpement LOgiciel','Intelligence artificielle','Machine learning','Big data',
'Calcul scientifique','Méthodes numériques','Systèmes distribués','Reseaux informatiques']);

        $categorie->each(fn($categorieProject)=>CategorieProject::create([
            'name'=>$categorieProject,
        ]));
        //
    }
}
