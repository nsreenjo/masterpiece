<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function index()
    {
        $usersFromDB = User::all();
        return view("dashboard.users.index", ["users" => $usersFromDB]); 
    }

    public function create()
    {
        return view("dashboard.users.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_first_name' => 'required|string|max:15|regex:/^\S*$/u', 
            'user_last_name' => 'required|string|max:15|regex:/^\S*$/u',
            'user_email' => 'required|email|unique:users,user_email|max:255',
            'user_password' => 'required|confirmed',
            'user_mobile' => 'required|numeric|digits_between:9,15',
            'user_address' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'date_of_birth' => 'required|date',
            'user_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'role' => 'required|in:user,admin,superadmin',


        ]);

       

       
        



        $imgName = null;
        if ($request->hasFile('user_image')) {
            $img = $request->file('user_image');
            $imgName = time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('uploads/users'), $imgName);
        }

        User::create([
            'user_first_name' => $request->user_first_name,  
            'user_last_name' => $request->user_last_name,
            'user_image' => $imgName,
            'user_email' => $request->user_email,
            'user_password' => Hash::make($request->user_password),
            'user_mobile' => $request->user_mobile,
            'user_address' => $request->user_address,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'type' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show($id)
    {
        $user = User::where('user_id', $id)->first();
        return view('dashboard.users.show', compact('user'));
    }

    public function edit(string $id)
    {
        $user = User::where('user_id', $id)->firstOrFail();
        return view('dashboard.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // التحقق من صحة المدخلات
        $request->validate([
            'user_first_name' => 'required|string|max:15|regex:/^\S*$/u',
            'user_last_name' => 'required|string|max:15|regex:/^\S*$/u',
            'user_email' => 'required|email|unique:users,user_email,' . $id . ',user_id|max:255',
            'user_mobile' => 'required|numeric|digits_between:9,15',
            'user_address' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'date_of_birth' => 'required|date',
            'user_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'role' => 'required|in:user,admin,superadmin',
        ]);
    
        $user = User::findOrFail($id);
    
        if ($request->hasFile('user_image')) {
            if ($user->user_image && file_exists(public_path('uploads/users/' . $user->user_image))) {
                unlink(public_path('uploads/users/' . $user->user_image));
            }
    
            $img = $request->file('user_image');
            $imgName = time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('uploads/users'), $imgName);
            $user->user_image = $imgName;
        }
    
        $user->update([
            'user_first_name' => $request->user_first_name,
            'user_last_name' => $request->user_last_name,
            'user_email' => $request->user_email,
            'user_mobile' => $request->user_mobile,
            'user_address' => $request->user_address,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'type' => $request->role, 
        ]);
    
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
    
        if ($user->user_image && file_exists(public_path('uploads/users/' . $user->user_image))) {
            unlink(public_path('uploads/users/' . $user->user_image));
        }
    
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }


/////////////////////////////////////////////////////////////////////////////////////////////////

    public function register(Request $request)
    {
        $request->validate([
            'user_first_name' => 'required|string|max:255',
            'user_last_name' => 'required|string|max:255',
            'user_email' => 'required|string|email|max:255|unique:users',
            'user_mobile' => 'required|string|max:15',
            'user_address' => 'required|string|max:255',
            'gender' => 'required|string',
            'date_of_birth' => 'required|date',
            'user_password' => 'required|string|min:8|confirmed',
        ]);
    
        User::create([
            'user_first_name' => $request->user_first_name,
            'user_last_name' => $request->user_last_name,
            'user_email' => $request->user_email,
           'user_mobile' => $request->user_mobile,
            'user_address' => $request->user_address,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'user_password' => bcrypt($request->user_password),
        ]);
    
        return redirect()->route('login.form')->with('success', 'Registration successful!');
    }


///////////////////////////////////////////////////////////



public function login(Request $request)
{
    $request->validate([
        'user_email' => 'required|string|email|max:255',
        'user_password' => 'required|string|min:8',
    ]);

    if (Auth::attempt(['email' => $request->user_email, 'password' => $request->user_password])) {
        $user = Auth::user(); 

        if ($user->type == 'admin' || $user->type == 'super_admin') {
            return redirect()->intended('dashboard')->with('success', 'Welcome to the Admin Dashboard!');
        } else {
            return redirect()->route('landingpags')->with('success', 'Welcome back!');
        }
    }

    return back()->withErrors([
        'user_email' => 'The provided credentials do not match our records.',
    ])->onlyInput('user_email');
}




}
