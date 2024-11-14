<?php

namespace App\Http\Controllers;
use App\Models\Product;

use App\Models\Mall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MallController extends Controller
{
    public function index()
    {
        if (Auth::user()->ype === 'superAdmin') {
            $mallsFromDB = Mall::with('user')->get();
        } else {
            $mallsFromDB = Mall::where('user_id', Auth::id())->with('user')->get();
        }
    
        return view("dashboard.malls.index", ["malls" => $mallsFromDB]);
    }
    
    public function create()
    {
        return view('dashboard.malls.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'mall_name' => 'required',
            'mall_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'mall_address' => 'required',
            'mall_descrbtion' => 'required',
        ]);

        $imgName = null;
        if ($request->hasFile('mall_image')) {
            $img = $request->file('mall_image');
            $imgName = time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('uploads/malls'), $imgName);
        }

        Mall::create([
            'mall_name' => $request->mall_name,
            'mall_image' => $imgName,
            'mall_address' => $request->mall_address,
            'mall_descrbtion' => $request->mall_descrbtion,
            'user_id' => Auth::id(), // تعيين user_id
        ]);

        return redirect()->route('malls.index')->with('success', 'Mall created successfully.');
    }

    // عرض مول معين بناءً على الصلاحيات
    public function show($id)
    {
        $mall = Mall::where('mall_id', $id)->where('user_id', Auth::id())->with('user')->first();
        if (!$mall) {
            return redirect()->route('malls.index')->with('error', 'Mall not found or you do not have access.');
        }
        return view('dashboard.malls.show', compact('mall'));
    }

    // عرض صفحة تعديل مول معين بناءً على الصلاحيات
    public function edit($id)
    {
        $mall = Mall::where('mall_id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('dashboard.malls.edit', compact('mall'));
    }

    // تحديث معلومات مول معين بناءً على الصلاحيات
    public function update(Request $request, $id)
    {
        $request->validate([
            'mall_name' => 'required',
            'mall_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'mall_address' => 'required',
            'mall_descrbtion' => 'required',
        ]);

        $mall = Mall::where('mall_id', $id)->where('user_id', Auth::id())->first();
        if (!$mall) {
            return redirect()->route('malls.index')->with('error', 'Mall not found or you do not have access.');
        }

        $imgName = $mall->mall_image;
        if ($request->hasFile('mall_image')) {
            $img = $request->file('mall_image');
            $imgName = time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('uploads/malls'), $imgName);

            if ($mall->mall_image) {
                unlink(public_path('uploads/malls/' . $mall->mall_image));
            }
        }

        $mall->update([
            'mall_name' => $request->mall_name,
            'mall_image' => $imgName,
            'mall_address' => $request->mall_address,
            'mall_descrbtion' => $request->mall_descrbtion,
        ]);

        return redirect()->route('malls.index')->with('success', 'Mall updated successfully.');
    }

    // حذف مول معين بناءً على الصلاحيات
    public function destroy($id)
    {
        $mall = Mall::where('mall_id', $id)->where('user_id', Auth::id())->first();

        if ($mall) {
            $filePath = public_path('uploads/malls/' . $mall->mall_image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $mall->delete();
            return redirect()->route('malls.index')->with('success', 'Mall deleted successfully.');
        } else {
            return redirect()->route('malls.index')->with('error', 'Mall not found or you do not have access.');
        }
    }
// MallController.php
// MallController.php

public function showland($mall_id , Request $request)
{
    $mall = Mall::findOrFail($mall_id); // ابحث عن المول بناءً على المعرف

    if ($request->has('cat_id') && $request->cat_id) {

    $allproduct = Product::where('category_id', $request->cat_id)->get();
    // ->where('mall_id',$request->mall_id)->get();
    } else {
    // Get all products if no category is selected
    $allproduct = Product::all();
    }

    return view('landingpage.mall', compact('mall')); // اعرض صفحة التفاصيل
}




    
}
