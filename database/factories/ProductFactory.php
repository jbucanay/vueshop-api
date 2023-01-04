<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;
    public function definition()

    {
         $faker = \Faker\Factory::create();
        $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));
        $faker->promotionCode; // KillerPromotion257835
$faker->department; // Kids & Games
$faker->department(6); // Games, Industrial, Books & Automotive
$faker->department(3, true); // Jewelry, Music & Shoes
$str = $faker->productName; // Small Rubber Bottle
        return [
            'product_name' => $this->$str
        ];
    }
}
