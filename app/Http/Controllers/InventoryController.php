<?php



namespace App\Http\Controllers;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function update(Request $request, $id){

       
        $newQuantity = $request->remainder;
        $inventory = Inventory::find($id);
        $inventory->quantity =  $newQuantity;
        $inventory->save();
        
    }
}
