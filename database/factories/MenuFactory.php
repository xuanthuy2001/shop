<?php

namespace Database\Factories;



use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'parent_id' => $this->faker->randomElement(['0', '1', '2']),
            'description' => $this->faker->address(),
            'content' => $this->faker->phoneNumber(),
            'active' => $this->faker->randomElement(['0', '1']),
        ];
    }
}