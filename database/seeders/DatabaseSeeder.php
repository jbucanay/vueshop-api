<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Media;
use App\Models\Inventory;
use App\Models\Discount;
use App\Models\Category;
use MarkSitko\LaravelUnsplash\Facades\Unsplash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
         $faker = \Faker\Factory::create();
        \Bezhanov\Faker\ProviderCollectionHelper::addAllProvidersTo($faker);
        
        {
        for($i = 1; $i <= 1;$i++ ){
        $discount = Discount::create(['discount_name'=> 'another test']);
        $category = Category::create(['category_name'=> 'test']);
        $inventory = Inventory::create(['quantity' => 1]);
        $product = Product::create(['product_name' => $faker->productName, 'inventory_id' => $inventory->inventory_id, 'category_id'=>$category->category_id, 'discount_id'=> $discount->discount_id]);
        $productName = explode(" ", $product->product_name);
        $searchTerm = end($productName);
        $imageCount = rand(1,2);
        $getImages = Unsplash::randomPhoto()
            ->orientation('landscape')
            ->term($searchTerm)
            ->count($imageCount)
            ->toJson();
        info($getImages);
        for($j = 0; $j <= $imageCount-1; $j++){
            $media = Media::create(['product_id'=> $product->product_id, 'media_name'=> 'just making sure', 'media_link'=> $getImages[$j]->urls->full]);
        }
      
      
        }
        
    }
    }
}
