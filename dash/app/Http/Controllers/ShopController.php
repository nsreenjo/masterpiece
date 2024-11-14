<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $allcategory = Category::all();
    // Check if 'cat_id' is provided in the request
    if ($request->has('cat_id') && $request->cat_id) {
        // Get products for the selected category
        $allproduct = Product::where('category_id', $request->cat_id)->get();
        // ->where('mall_id',$request->mall_id)->get();
    } else {
        // Get all products if no category is selected
        $allproduct = Product::all();
    }

    
        return view('landingpage.shop', compact('allproduct', 'allcategory'));
    }
    
}