<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/landlandingpags';

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'user_email' => 'required|string|email|max:255',
            'user_password' => 'required|string|min:8',
        ]);
    
        $user = User::where('user_email', $request->user_email)->first();
    
        if ($user && Hash::check($request->user_password, $user->user_password)) {
            Auth::login($user);
    
            if ($user->type == 'admin' || $user->type == 'superAdmin') {
                return redirect()->route('dashboard.index', ['mall_id' => $user->mall_id])
                                 ->with('success', 'Welcome to the Admin Dashboard!');
            } else {
                return redirect()->route('landingpags.index')->with('success', 'Welcome back!');
            }
        }
    
        return back()->withErrors([
            'user_email' => 'The provided credentials do not match our records.',
        ])->onlyInput('user_email');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('landingpags.index')->with('success', 'You have been logged out.');
    }
    
}
