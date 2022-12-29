<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::with('discount','media')->get();
        
        
        // Product::join('product_discount', 'product_discount.discount_id', '=', 'product.discount_id')
        // ->with(['product_media'=> function($query){
        //     $query->first();
        // }])
        // ->get(['product.product_id','product.product_name','product_media.media_link as image']);
            return $data;
    }

 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedDate = $request->validate([
            'name' => 'bail|required|string',
            'price'=> 'bail|required',
            'quantity'=> 'bail|required|integer',
            'type'=>'bail|required|string',
            'image'=>'bail|required|string'
        ]);
        Product::create($validatedDate);
        return Product::all();
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {   
        $newQuantity = $request->quantity;
        $product->quantity = $newQuantity;
        $product->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
