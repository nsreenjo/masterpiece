<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Mall;

class CategoryController extends Controller
{
    public function index()
    {
        $categoriesFromDB = Category::with('mall')->get();
        return view('dashboard.categories.index', ['categories' => $categoriesFromDB]);
    }

    public function create()
    {
        $malls = Mall::all(); 
        return view('dashboard.categories.create', compact('malls')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'category_descrbtion' => 'required',
            'category_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'mall_id' => 'required',
        ]);

        $img = $request->file('category_img');
        $ImgName = null;

        if ($img) {
            if (!file_exists(public_path('uploads/categories'))) {
                mkdir(public_path('uploads/categories'), 0777, true);
            }

            $ImgName = time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('uploads/categories'), $ImgName);
        }

        Category::create([
            'category_name' => $request->category_name,
            'category_descrbtion' => $request->category_descrbtion,
            'category_img' => $ImgName,
            'mall_id' => $request->mall_id, 
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function show($id)
    {
        $category = Category::with('mall')->where('category_id', $id)->firstOrFail(); 
        return view('dashboard.categories.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::where('category_id', $id)->firstOrFail();
        $malls = Mall::all(); 
        return view('dashboard.categories.edit', compact('category', 'malls'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required',
            'category_descrbtion' => 'required',
            'category_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'mall_id' ,
        ]);

        $category = Category::where('category_id', $id)->first();

        $img = $request->file('category_img');
        if ($img) {
            $imgName = time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('uploads/categories'), $imgName);

            if ($category->category_img && file_exists(public_path('uploads/categories/' . $category->category_img))) {
                unlink(public_path('uploads/categories/' . $category->category_img));
            }
        } else {
            $imgName = $category->category_img;
        }

        $category->update([
            'category_name' => $request->category_name,
            'category_descrbtion' => $request->category_descrbtion,
            'category_img' => $imgName,
            'mall_id' => $request->mall_id ? $request->mall_id : $category->mall_id,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::where('category_id', $id)->first();
        
        if ($category) {
            $filePath = public_path('uploads/categories/' . $category->category_img);
            
            if ($category->category_img && file_exists($filePath)) {
                unlink($filePath);
            }

            $category->delete();
            return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
        } else {
            return redirect()->route('categories.index')->with('error', 'Category not found.');
        }
    }

//////////////////////////////////////////////////////////////////////////////////////////////
public function getMallCategoriesByEmail(Request $request)
{
    $request->validate(['email' => 'required|email']);

    // الحصول على المستخدم بناءً على البريد الإلكتروني
    $user = User::where('email', $request->email)->first();

    // تحقق مما إذا كان المستخدم موجودًا
    if ($user) {
        // الحصول على المولات المرتبطة بالمستخدم
        $malls = Mall::where('user_id', $user->id)->get();

        // مصفوفة لتخزين الكاتيجوري الخاصة بكل مول
        $mallCategories = [];

        // استخرج الكاتيجوري لكل مول
        foreach ($malls as $mall) {
            $categories = Category::where('mall_id', $mall->mall_id)->get();
            $mallCategories[$mall->mall_id] = [
                'mall_name' => $mall->mall_name,
                'categories' => $categories
            ];
        }

        return response()->json($mallCategories); // إعادة البيانات بصيغة JSON
    } else {
        return response()->json(['message' => 'User not found'], 404);
    }
}

public function createcategory()
{
    // هنا يمكنك إضافة المنطق لإنشاء الكاتيجوري إذا لزم الأمر
    return view('dashboard.categories.create');
}

// باقي الطرق مثل index، store، edit، update، destroy

 

}
