<?php

namespace App\Http\Controllers;

use App\Models\Mall; 
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {

        $frontmalls = Mall::all();
        $categories = Category::all();
        $allProducts = Product::all(); // Change variable name to $allProducts
      
        return view('landingpage.layout.app', compact('frontmalls', 'allProducts','categories'));
    }

    public function show($id)
    {
        // Get the specific mall by ID (if needed for mall-specific data)
        $frontmall = Mall::findOrFail($id);
        
        // Fetch all products from all malls
        $allProducts = Product::all(); // Change variable name to $allProducts
        
        // Pass the mall and all products to the view
        return view('landingpage.include.mall', compact('frontmall', 'allProducts')); // Use $allProducts
    }
}
