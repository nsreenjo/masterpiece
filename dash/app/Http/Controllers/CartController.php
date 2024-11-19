<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Shoppingcarts;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * عرض صفحة السلة.
     */
    public function index()
    {
    
        $cart = json_decode(Cookie::get('cart', json_encode([])), true);
        $subtotal = 0;
               foreach ($cart as $item) {
                   $subtotal += $item['price'] * $item['quantity'];
               }
    
        return view('landingpage.cart', compact( 'subtotal','cart'));
    }
    

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

public function checkout(Request $request)
{
    // Retrieve the cart from cookies
    $cart = json_decode(Cookie::get('cart', json_encode([])), true);

    // Check if the cart is empty
    if (empty($cart)) {
        return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
    }

    // Calculate the subtotal
    $subtotal = 0;
    foreach ($cart as $item) {
        $subtotal += $item['price'] * $item['quantity'];
    }

    // Get user data
    $user = Auth::user();

    // Insert a new order into the `orders` table
    $order = new Order();
    $order->order_total_pric = $subtotal; // Total price
    $order->order_status = 'pending'; // Order status
    $order->user_id = Auth::id(); // User ID
    $mallId = $user->mall_id; // Mall ID associated with the user
    $order->mall_id = $mallId; // Assign mall ID
    $order->created_at = now();
    $order->updated_at = now();
    $order->save();

    // Insert cart items into the `order_details` table
    foreach ($cart as $item) {
        \App\Models\OrderDetail::create([
            'order_id' => $order->order_id, // Foreign key to the order
            'product_id' => $item['product_id'], // Product ID
            'quantity' => $item['quantity'], // Quantity
            'price' => $item['price'], // Price per unit
            'total_price' => $item['price'] * $item['quantity'], // Total price for this item
        ]);
    }

    // Clear the cart after completing the order
    Cookie::queue(Cookie::forget('cart'));

    // Redirect to the success or order confirmation page
    return redirect()->route('cart.index')->with('success', 'Order placed successfully!');
}


}
