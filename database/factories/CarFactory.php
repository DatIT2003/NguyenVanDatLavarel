<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        

        // Tạo tên file ảnh từ số ngẫu nhiên và thư mục
        return [
            'description' => fake()->asciify('user-****'), // Đã sửa lại không còn khoảng trắng
            'model' => fake()->regexify('[A-Z]{5}[0-4]{3}'),
            'produced_on' => now(),
            'image' => 'xe'.rand(1,5).'.jpg',
            'mf_id'=>rand(1,10),
        ];
        
    }
}