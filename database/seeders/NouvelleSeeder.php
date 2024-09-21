<?php

namespace Database\Seeders;

use App\Models\Nouvelle;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NouvelleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Nouvelle::factory(5)->create(); 
        //
    }
}
