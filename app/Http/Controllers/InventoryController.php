<?php



namespace App\Http\Controllers;
use App\Models\Inventory;
use Illuminate\Http\Request;




class InventoryController extends Controller
{
    public function update(Request $request, $id){
        $faker = \Faker\Factory::create();
        \Bezhanov\Faker\ProviderCollectionHelper::addAllProvidersTo($faker);
        // $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));
        
        // $counter = rand(1,2);
        // info($counter);
        // $person = Unsplash::randomPhoto()
        //     ->orientation('landscape')
        //     ->term('Knife')
        //     ->count($counter)
        //     ->toJson();
        // for($i = 0; $i <= $counter-1; $i++){
        //     info($person[$i]->urls->full);
        // }

        $productName = $faker->productName;
        $price = $faker->randomFloat(2, 1,5000);
        info($productName);
        info($price);

        $newQuantity = $request->remainder;
        $inventory = Inventory::find($id);
        $inventory->quantity =  $newQuantity;
        $inventory->save();  
       
       
    }
}
