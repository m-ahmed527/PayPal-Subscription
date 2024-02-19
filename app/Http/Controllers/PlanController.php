<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Product;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index(Request $request)
    {
        //  dd($request->all());
        $plans = Plan::get();
        $product= Product::where('id',$request->prod_id)->first();
        // dd($products);
        return view("plans", get_defined_vars());
    }

}
