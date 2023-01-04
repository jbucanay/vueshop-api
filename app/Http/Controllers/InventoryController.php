<?php



namespace App\Http\Controllers;
use App\Models\Inventory;
use Illuminate\Http\Request;
use MarkSitko\LaravelUnsplash\Facades\Unsplash;



class InventoryController extends Controller
{
    public function update(Request $request, $id){
        $counter = rand(1,5);
        info($counter);
        $person = Unsplash::randomPhoto()
            ->orientation('landscape')
            ->term('phone')
            ->count($counter)
            ->toJson();
        for($i = 0; $i <= $counter-1; $i++){
            info($person[$i]->urls->full);
        }
        // info($person[0]->urls->full);
        // info($person[1]->urls->full);
        // info(rand(1,5));

        $newQuantity = $request->remainder;
        $inventory = Inventory::find($id);
        $inventory->quantity =  $newQuantity;
        $inventory->save();  
       
       
    }
}
