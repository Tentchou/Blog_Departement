<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\GrandTitre;
use Illuminate\Database\Seeder;
use App\Models\CategorieProject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

        // gerer et faire migrer les factory

        // Project::factory(10)->create();

        public function run(): void
        {
            $categorie = CategorieProject::all();

            //gestion tags

            $grandTitre = GrandTitre::all();

            Project::factory(15)
            ->sequence(fn() =>[
               'categorie_project_id'=>$categorie->random(),
               'grand_titre_id'=>$grandTitre->random(),
            ])
            ->create();

            //
        }



}
