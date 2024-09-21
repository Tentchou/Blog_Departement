<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Project::class;

    public function definition(): array
    {

        return [
            //'grand_titre' => $this->faker->sentence,
            'title' => $this->faker->unique()->sentence,
            'image' => $this->faker->imageUrl(),
            'description' => $this->faker->paragraphs(asText: true),
            
        ];
    }
}
