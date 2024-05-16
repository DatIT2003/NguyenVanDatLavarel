<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class MfFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $mang=['Toyota','Hyundai','Ford','Mitsubishi','Mazda','Suzuki','Mercedes-Benz','Aud','Honda','BMW'];
        return [
            'mf_name' => fake()->unique()->randomElement($mang),
            //
        ];
    }
}