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

        for ($i = 1; $i <= 30; $i++) {
            $choice = [
                "device" => $faker->deviceManufacturer,
                "other" => $faker->department,
            ];
            $selected = array_rand($choice, 1);

            $discount = Discount::create([
                "discount_name" => $faker->promotionCode,
                "discount_description" => $faker->paragraph(),
                "discount_percent" => $faker->randomDigitNotNull() + rand(3, 8),
                "active_state" => rand(0, 1),
                "expiration_date" => date(
                    "Y-m-d",
                    strtotime("+" . mt_rand(0, 365) . " days")
                ),
                "discount_image" =>
                    "https://source.unsplash.com/random/?christmas,sale,games,happy,shopping,bogo,summer,shopping,red,yellow,products,percent",
            ]);
            $category = Category::create([
                "category_name" =>
                    $selected == "device"
                        ? $choice["device"]
                        : $choice["other"],
                "category_description" => $faker->paragraph(),
            ]);
            $inventory = Inventory::create(["quantity" => rand(1, 50)]);
            $condition = [
                "one" => "New",
                "two" => "New with defects",
                "three" => "Certified - Refurbished",
                "four" => "Seller refurbished",
                "five" => "Used",
                "six" => "Acceptable",
            ];
            $shippingCost = [
                "one" => $faker->randomFloat(2, 3, 15),
                "free" => "Free Shipping",
            ];
            $product = Product::create([
                "product_name" =>
                    $selected == "device"
                        ? $faker->deviceModelName
                        : $faker->productName,
                "inventory_id" => $inventory->inventory_id,
                "category_id" => $category->category_id,
                "discount_id" => $discount->discount_id,
                "product_description" => $faker->paragraph(),
                "product_sku" => $faker->deviceSerialNumber,
                "price" => $faker->randomFloat(2, 1, 5000),
                "shipping_cost" => $shippingCost[array_rand($shippingCost, 1)],
                "product_condition" => $condition[array_rand($condition, 1)],
            ]);
            $productName = explode(" ", $product->product_name);
            $searchTerm =
                $selected == "other" ? end($productName) : reset($productName);
            $imageCount = rand(1, 5);
            $getImages = Unsplash::randomPhoto()
                ->orientation("landscape")
                ->term($searchTerm)
                ->count($imageCount)
                ->toJson();

            for ($j = 0; $j <= $imageCount - 1; $j++) {
                $media = Media::create([
                    "product_id" => $product->product_id,
                    "media_name" => $getImages[$j]->description
                        ? $getImages[$j]->description
                        : "product image name coming soon",
                    "media_link" => $getImages[$j]->urls->full,
                    "media_type" => "Photo",
                ]);
            }
        }
    }
}
