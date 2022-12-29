<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index(){
        $discountData = Discount::all();

        return $discountData;
    }
}
