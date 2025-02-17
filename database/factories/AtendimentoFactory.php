<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Atendimento>
 */
class AtendimentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'data_atendimento' => date('Y-m-d H:i:s'),
            'medico_id' => \App\Models\Medico::factory(),
            'paciente_id' => \App\Models\Paciente::factory(),
        ];
    }
}
