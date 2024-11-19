<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Mall;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    // عرض الكاتيجوري المرتبطة بالمول الخاص بالمستخدم فقط
    public function index()
    {
        $user = Auth::user();
    
        if ($user->type === 'superAdmin') {
            // إذا كان المستخدم سوبر أدمن، جلب جميع الفئات
            $categories = Category::all();
        } else {
            // إذا لم يكن سوبر أدمن، جلب الفئات المرتبطة بالمول الخاص بالمستخدم فقط
            $categories = Category::where('mall_id', $user->mall_id)->get();
        }
    
        return view('dashboard.categories.index', ['categories' => $categories]);
    }
    

    // عرض صفحة إنشاء كاتيجوري جديدة
    public function create()
    {
        $malls = Mall::all(); // احضار جميع المولات
        return view('dashboard.categories.create', compact('malls'));
    }
    

    // تخزين كاتيجوري جديدة مرتبطة بالمول الخاص بالمستخدم
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_descrbtion' => 'nullable|string|max:1000',
            'category_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,avif|max:2048',
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_descrbtion = $request->category_descrbtion;
        $category->mall_id = Auth::user()->mall_id;

        if ($request->hasFile('category_img')) {
            $image = $request->file('category_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/categories'), $filename);
            $category->category_img = $filename;
        }

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category added successfully!');
    }

    // عرض كاتيجوري محددة بناءً على ID
    public function show($id)
    {
        $category = Category::with('mall')->where('category_id', $id)->where('mall_id', Auth::user()->mall_id)->firstOrFail();
        return view('dashboard.categories.show', compact('category'));
    }

    // عرض صفحة التعديل على كاتيجوري معينة
    public function edit($id)
    {
        $category = Category::where('category_id', $id)->where('mall_id', Auth::user()->mall_id)->firstOrFail();
        return view('dashboard.categories.edit', compact('category'));
    }

    // تحديث بيانات كاتيجوري معينة
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required',
            'category_descrbtion' => 'nullable|string|max:1000',
            'category_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,avif|max:2048',
        ]);

        $category = Category::where('category_id', $id)->where('mall_id', Auth::user()->mall_id)->firstOrFail();

        if ($request->hasFile('category_img')) {
            $image = $request->file('category_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/categories'), $filename);

            if ($category->category_img && file_exists(public_path('uploads/categories/' . $category->category_img))) {
                unlink(public_path('uploads/categories/' . $category->category_img));
            }
            $category->category_img = $filename;
        }

        $category->category_name = $request->category_name;
        $category->category_descrbtion = $request->category_descrbtion;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    // حذف كاتيجوري معينة
    public function destroy($id)
    {
        $category = Category::where('category_id', $id)->where('mall_id', Auth::user()->mall_id)->firstOrFail();

        if ($category->category_img && file_exists(public_path('uploads/categories/' . $category->category_img))) {
            unlink(public_path('uploads/categories/' . $category->category_img));
        }

        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }

    // جلب الكاتيجوري للمول المرتبط بالبريد الإلكتروني
    public function getMallCategoriesByEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $user = User::where('email', $request->email)->first();

        if ($user) {
            $mallCategories = [];
            $malls = Mall::where('user_id', $user->id)->get();

            foreach ($malls as $mall) {
                $categories = Category::where('mall_id', $mall->mall_id)->get();
                $mallCategories[$mall->mall_id] = [
                    'mall_name' => $mall->mall_name,
                    'categories' => $categories
                ];
            }

            return response()->json($mallCategories); 
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
}
