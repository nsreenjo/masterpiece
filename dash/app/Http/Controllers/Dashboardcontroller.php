<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Mall;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
    
         if (!$user) {
            return redirect()->route('landingpags.index')->with('error', 'You do not have access to the dashboard.');
        }
    
        if ($user->type === 'admin' || $user->type === 'superAdmin') {
            $mall_id = $user->mall_id;

    
            $categories = Category::where('mall_id', $mall_id)->with('mall')->get();
            $mall = Mall::find($mall_id);
    
            return view('dashboard.index', compact('categories', 'mall'));
        }
        
        return redirect()->route('landingpags.index')->with('error', 'You do not have access to the dashboard.');
    }
    
}
