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
        $data = Product::with(
            "discount:discount_id,discount_percent",
            "media:product_id,media_link"
        ) // columns from each join
            ->get([
                "product_name",
                "product_id",
                "price",
                "category_id",
                "shipping_cost",
                "discount_id",
            ]); // columns from product or parent model
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
            "name" => "bail|required|string",
            "price" => "bail|required",
            "quantity" => "bail|required|integer",
            "type" => "bail|required|string",
            "image" => "bail|required|string",
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
        return $product
            ::with(
                "inventory:inventory_id,quantity",
                "discount:discount_id,discount_percent",
                "media:product_id,media_id,media_link"
            )
            ->where("product_id", $product->product_id)
            ->get([
                "product_name",
                "product_id",
                "price",
                "shipping_cost",
                "discount_id",
                "product_description",
                "inventory_id",
            ]);
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
