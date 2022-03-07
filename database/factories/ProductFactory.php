<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ean_13' => $this->faker->ean13,
            'title' => $this->faker->name,
            'stock' => rand(1, 100),
            'cost' => round(rand(1, 100) / 0.77, 2),
        ];
    }
}
