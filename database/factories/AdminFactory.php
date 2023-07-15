<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => "Salem",
            'email' => "salem@admin.com",
            'password' => '$2y$10$C/sjElazgpbvSLINzSQXSuBbX9ULoMok2HFleZES12E5kzqaGbIO6', // password
        ];
    }
}
