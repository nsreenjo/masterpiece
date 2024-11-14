<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // الحصول على دور المستخدم (أو يمكنك التحقق من نوع المستخدم إذا كنت تستخدم طريقة مختلفة لتحديد الأدوار)
        $user = Auth::user();
    
        // إذا كان المستخدم هو سوبر أدمن، استرجع جميع المنتجات
        if ($user->type === 'superAdmin') { // استبدل 'role' و 'super_admin' بالقيم الصحيحة من مشروعك
            $productsFromDB = Product::with('category')->get();
        } else {
            // الحصول على معرف المول الخاص بالمستخدم الحالي
            $userMallId = $user->mall_id;
    
            // استرجاع المنتجات الخاصة بالمول فقط
            $productsFromDB = Product::with(['category' => function ($query) use ($userMallId) {
                $query->where('mall_id', $userMallId);
            }])
            ->whereHas('category', function ($query) use ($userMallId) {
                $query->where('mall_id', $userMallId);
            })
            ->get();
        }
    
        return view("dashboard.products.index", ["products" => $productsFromDB]);
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    $userMallId = Auth::user()->mall_id; // الحصول على معرف المول الخاص بالمستخدم
    
    // جلب الفئات الخاصة بالمول فقط
    $categories = Category::where('mall_id', $userMallId)->get();

    // إذا لم يتم العثور على فئات، يمكن تقديم رسالة أو إجراء آخر
    if ($categories->isEmpty()) {
        // يمكن إضافة منطق إضافي هنا إذا كان ضرورياً
    }

    return view('dashboard.products.create', compact('categories')); // تمرير الفئات إلى العرض
}

    
    


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_price' => 'required',
            'product_descrbtion' => 'required',
            'category_id' => 'required|exists:categories,category_id',
        ]);
    
        $imgName = null;
    
        if ($request->hasFile('product_image')) {
            $img = $request->file('product_image');
            $imgName = time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('uploads/products'), $imgName);
        }
    
        // Store the product in the database
        Product::create([
            'product_name' => $request->product_name,
            'product_image' => $imgName,
            'product_price' => $request->product_price,
            'product_descrbtion' => $request->product_descrbtion,
            'category_id' => $request->category_id,
        ]);
    
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::where('product_id', $id)->first();

        return view('dashboard.products.show', compact('product'));  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::where('product_id', $id)->firstOrFail();
        $categories = Category::all(); 

        return view('dashboard.products.edit', compact('product', 'categories')); 
        // return ("ht");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_price' => 'required',
            'product_descrbtion' => 'required',
            'category_id' => 'required|exists:categories,category_id',
        ]);
    
        $product = Product::where('product_id', $id)->first();
    
        if ($request->hasFile('product_image')) {
            $img = $request->file('product_image');
            $imgName = time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('uploads/products'), $imgName); 
            
            if ($product->product_image) {
                unlink(public_path('uploads/products/' . $product->product_image));
            }
        } else {
            $imgName = $product->product_image; 
        }
    
        $product->update([
            'product_name' => $request->product_name,
            'product_image' => $imgName,
            'product_price' => $request->product_price,
            'product_descrbtion' => $request->product_descrbtion,
            'category_id' => $request->category_id,
        ]);
    
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product= Product::where('product_id', $id)->first();
        
        if ($product) {
            $filePath = public_path('uploads/products/' . $product->product_image);
            
            if (file_exists($filePath)) {
                unlink($filePath);
            }
    
            $product->delete();
            return redirect()->route('products.index')->with('success', 'product deleted successfully.');
        } else {
            return redirect()->route('products.index')->with('error', 'product not found.');
        }
    }
}
