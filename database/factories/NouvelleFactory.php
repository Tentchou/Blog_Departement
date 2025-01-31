<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nouvelle>
 */
class NouvelleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->sentence();
        $content = fake()->paragraphs(asText: true);
        $created_at = fake()->dateTimeBetween('-1 year');
        //ici, la classe factory permet l'enregistrement d'un seul post
        //ce qui sera enregistrer par un seeder . NB: on peut creer un post directement sans passer
        //par les factorys. NOus verrons cela bien apres tout au long de notre projet
        return [
            'title'=>$title,
            'demi_description'=>Str::limit($content, 70),
            'description'=>$content,
            'photo'=>fake()->imageUrl,
            'created_at'=>$created_at,
            'updated_at'=>$created_at   //
        ];
    }
}
