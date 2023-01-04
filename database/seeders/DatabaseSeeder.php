<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Media;
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
        for($i = 0; $i <= 1;$i++ ){
        $product = Product::create(['product_name' => $faker->productName]);
        $media = Media::create(['product_id'=> $product->product_id]);
        }
        // DB::table('product')->insert([
        //     'product_name' => $faker->productName,
        // ]);
    }
    }
}
