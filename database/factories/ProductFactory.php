<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'thumb' => $this->faker->imageUrl($width = 640, $height = 480),
            'description' =>  $this->faker->address(),
            'content' => $this->faker->address(),
            'menu_id' => Menu::select("*")->inRandomOrder()->value('id'),
            'price' => "1200$",
            'price_sale' => "1000$",
            'active' => $this->faker->randomElement(['0', '1']),
        ];
    }
}