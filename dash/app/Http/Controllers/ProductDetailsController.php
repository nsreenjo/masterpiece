<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Session;

class ProductDetailsController extends Controller
{
    /**
     * Display the specified product.
     */
    public function show($id)
    {
        $product = Product::find($id);
        
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }
        
        return view("landingpage.productDetails", compact('product'));
    }

    /**
     * Add product to the cart.
     */
    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        
        
        
        // Check if cart already exists in session
        $cart = session()->get('cart', []);
        
        // Check if product already exists in the cart
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'product_name' => $product->product_name,
                'product_price' => $product->product_price,
                'quantity' => 1
            ];
        }

        // Save the cart in session
        session()->put('cart', $cart);
        
        return redirect()->back()->with('success', 'Product added to cart!');
    }
}
