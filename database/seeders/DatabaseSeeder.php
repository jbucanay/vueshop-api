<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Media;
use App\Models\Inventory;
use App\Models\Discount;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // // \App\Models\User::factory(10)->create();

        // // \App\Models\User::factory()->create([
        // //     'name' => 'Test User',
        // //     'email' => 'test@example.com',
        // // ]);

        // Product::factory(1)->create();
         $faker = \Faker\Factory::create();
        $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));
        
        {
        for($i = 1; $i <= 1;$i++ ){
        $discount = Discount::create(['discount_name'=> 'another test']);
        $category = Category::create(['category_name'=> 'test']);
        $inventory = Inventory::create(['quantity' => 1]);
        $product = Product::create(['product_name' => $faker->productName, 'inventory_id' => $inventory->inventory_id, 'category_id'=>$category->category_id, 'discount_id'=> $discount->discount_id]);
        $media = Media::create(['product_id'=> $product->product_id, 'media_name'=> 'just making sure']);
        }
        
    }
    }
}
