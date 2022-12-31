<?php

use App\Http\Controllers\DiscountController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=>'auth:sanctum'], function(){
Route::resource('user', UserController::class)-> only([
    'store', 'destroy'
]);
});

// allow users to add products to cart and see all products
// Route::resource('products', ProductController::class)->only([
//     'update', 'index', 'show'
// ]);

//excludes create and edit
Route::apiResource('products', ProductController::class);


Route::get('discounts', [DiscountController::class, 'index']);
Route::post('login',[UserController::class, 'index']);