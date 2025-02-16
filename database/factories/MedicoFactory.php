<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medico>
 */
class MedicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,
            'crm' => $this->faker->unique()->numerify('########-#') . '/' . $this->faker->randomElement(['SP', 'RJ', 'MG', 'RS', 'PR']),
            'especialidade' => $this->faker->word,
        ];
    }
}
