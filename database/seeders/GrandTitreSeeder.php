<?php

namespace Database\Seeders;

use App\Models\GrandTitre;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GrandTitreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grandtitre = collect(['Projets de mathématiques pures', 'Projets d\'optimisation et de recherche opérationnelle', ' Projets de cryptographie et sécurité informatique','Projets de développement logiciel et génie informatique',
    'Projets d\'intelligence artificielle et machine learning','Projets en calcul scientifique et simulation','Projets d\'informatique théorique',
' Projets d\'informatique graphique et traitement d\'image','Projets en réseaux et systèmes distribués']);

        $grandtitre->each(fn($grandTitre)=>GrandTitre::create([
            'title'=>$grandTitre,
        ]));

    }
}
