<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Shoppingcarts;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * عرض صفحة السلة.
     */
    public function index()
    {
        // استرجاع السلة من الكوكيز أو تعيينها كقائمة فارغة
        $cart = json_decode(Cookie::get('cart', json_encode([])), true);
        return view('landingpage.cart', compact('cart'));
    }

    /**
     * إضافة منتج إلى السلة.
     */
    public function add(Request $request)
    {

        
        $request->validate([
            'product_id' => 'required|integer',
            'product_name' => 'required|string',
            'product_price' => 'required|numeric',
            'quantity' => 'required|integer|min:1',

        ]);

        $cart = json_decode(Cookie::get('cart', json_encode([])), true);

        $cartItem = [
            'product_id' => $request->product_id,
            'name' => $request->product_name,
            'price' => $request->product_price,
            'quantity' => $request->quantity,
        ];

        if (isset($cart[$cartItem['product_id']])) {
            $cart[$cartItem['product_id']]['quantity'] += $cartItem['quantity'];
        } else {
            $cart[$cartItem['product_id']] = $cartItem;
        }

        // Set the updated cart in a cookie
        return redirect()->back()->with('success', 'Product added to cart successfully!')
            ->cookie('cart', json_encode($cart), 60 * 24 * 7); // Set cookie for 1 week
    }

   
    
public function remove($id)
{
    // Retrieve the cart from cookies or set it as an empty array
    $cart = json_decode(Cookie::get('cart', json_encode([])), true);

    // Check if the product exists in the cart
    if (isset($cart[$id])) {
        unset($cart[$id]); // Remove the product from the cart
    }

    // Update the cookie with the modified cart
    return redirect()->back()->with('success', 'Product removed from cart successfully!')
        ->cookie('cart', json_encode($cart), 60 * 24 * 7); // Set cookie for 1 week
}

}
