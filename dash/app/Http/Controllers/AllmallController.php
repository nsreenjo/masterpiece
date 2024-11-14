<?php


namespace App\Http\Controllers;

use App\Models\Mall;

class MallController extends Controller
{
    // عرض المول باستخدام mall_id
    public function show($mall_id)
    {
        // البحث عن المول باستخدام الـ mall_id
        $mall = Mall::findOrFail($mall_id);
    
        // إرسال المول إلى العرض
        return view('malls.show', compact('mall'));
    }
    
}
