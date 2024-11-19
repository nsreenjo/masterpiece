<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user(); // الحصول على المستخدم الحالي

        // التحقق إذا كان المستخدم سوبر أدمن (نحسبه بناءً على دور أو عمود معين في جدول users)
        if ($user->is_admin) {
            // إذا كان المستخدم سوبر أدمن، يتم عرض جميع الطلبات
            $orders = Order::with(['user', 'mall'])->latest()->get();
        } else {
            // إذا كان المستخدم عاديًا، يتم عرض الطلبات الخاصة بالمول المرتبط به
            $orders = Order::with(['user', 'mall'])
                ->where('mall_id', $user->mall_id) // فلترة الطلبات بناءً على المول
                ->latest()
                ->get();
        }

        return view('dashboard.orders.index', compact('orders'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
   // In OrderController.php

   public function show(string $id)
   {
       // Retrieve the order with the related store, user, and address
       $order = Order::with('mall', 'user')->find($id); // جلب الطلب مع بيانات المتجر والمستخدم
       
       // Check if the order exists
       if (!$order) {
           abort(404, 'Order not found');
       }
   
       // جلب تفاصيل الطلب مع المنتج المرتبط بكل تفاصيل
       $order_details = OrderDetail::with('product')
                                  ->where('order_id', $id)
                                  ->get();
       // يمكن عرض المنتجات والبيانات الإضافية مثل الكمية والسعر هنا إذا كنت بحاجة
       foreach ($order_details as $detail) {
           $product = $detail->product;  
           echo $product->product_name;  // اسم المنتج
           echo $detail->quantity;       // الكمية
           echo $detail->price;          // السعر
       }
   
       // إرسال البيانات إلى العرض
       return view('dashboard.orders.show', compact('order', 'order_details'));
   }
   


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
