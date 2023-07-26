<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MenuMakanan>
 */
class MenuMakananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nama' => fake()->name(),
            'deskripsi' => fake()->text(10),
            'kategori' => fake()->text(20),
            'harga' =>fake()->numberBetween($min=5000,$max=10000)
        ];
    }
}
