<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tugas>
 */
class TugasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tugas_name' => 'Test Tugas',
            'tugas_desc' => 'Ini Tugas',
            'kelas_id' => 1,
            'end_time' => time() + (24*60*60)
        ];
    }
}
