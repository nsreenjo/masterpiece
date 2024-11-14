<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    // إضافة المنتج إلى العربة
    public function addToCart(Request $request)
    {
        // الحصول على المنتج بناءً على معرفه
        $product = Product::find($request->product_id);

        // التحقق من وجود المنتج
        if ($product) {
            // جلب العربة من الجلسة أو استخدام مصفوفة فارغة إذا لم تكن موجودة
            $cart = session()->get('cart', []);

            // إذا كان المنتج موجودًا بالفعل في العربة
            if (isset($cart[$request->product_id])) {
                // زيادة الكمية الموجودة
                $cart[$request->product_id]['quantity'] += $request->quantity;
            } else {
                // إضافة المنتج الجديد
                $cart[$request->product_id] = [
                    'product_name' => $product->product_name,
                    'quantity' => $request->quantity,
                    'product_price' => $product->product_price,
                    'product_image' => $product->product_image ?? 'default.jpg', // صورة افتراضية في حال عدم وجود صورة
                ];
            }

            // تخزين العربة في الجلسة
            session()->put('cart', $cart);
        }

        // إعادة توجيه المستخدم مع رسالة نجاح
        return redirect()->route('cart.index')->with('success', 'Product added to cart');
    }

    // عرض محتويات العربة
    public function index()
    {
        // جلب العربة من الجلسة
        $cart = session()->get('cart', []); 

        // التحقق من وجود العربة
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        return view('cart.index', compact('cart'));
    }

    // صفحة الدفع
    public function checkout()
    {
        // جلب العربة من الجلسة
        $cart = session()->get('cart', []);

        // التحقق من وجود عربة غير فارغة
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // عرض صفحة الدفع مع العربة
        return view('checkout.index', compact('cart'));
    }

    // تحديث الكمية في العربة
    public function updateCart(Request $request)
    {
        // جلب العربة من الجلسة
        $cart = session()->get('cart');

        // التحقق من وجود المنتج في العربة
        if (isset($cart[$request->product_id])) {
            // تحديث الكمية
            $cart[$request->product_id]['quantity'] = $request->quantity;
            // تحديث الجلسة
            session()->put('cart', $cart);
        }

        // إعادة التوجيه إلى صفحة العربة
        return redirect()->route('cart.index');
    }

    // إزالة منتج من العربة
    public function removeFromCart($productId)
    {
        // جلب العربة من الجلسة
        $cart = session()->get('cart');

        // التحقق من وجود المنتج في العربة
        if (isset($cart[$productId])) {
            // إزالة المنتج من العربة
            unset($cart[$productId]);
            // تحديث الجلسة
            session()->put('cart', $cart);
        }

        // إعادة التوجيه إلى صفحة العربة
        return redirect()->route('cart.index');
    }
}
