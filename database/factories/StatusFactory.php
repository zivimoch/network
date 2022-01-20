<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Iluminate\Support\Str;
use App\Models\User; 
use App\Models\Status; 
class StatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'identifier' => strtolower(Str::random(32)),
            'content' => $this->faker->sentence();
        ];
    }
}