<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{

    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $productSuffixes = ['Pants','Glasses','Hat','Socks','Sweater'];
        $name = $this->faker->company . ' ' . Arr::random($productSuffixes);
        return [
            'name' => $name,
            'slug' =>Str::slug($name),
            'description' => $this->faker->realText(320),
            'price' => $this->faker->numberBetween(1000,10000),
        ];
    }
}
