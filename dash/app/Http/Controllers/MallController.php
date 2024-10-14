<?php

namespace App\Http\Controllers;

use App\Models\mall;
use Illuminate\Http\Request;

class MallController extends Controller
{
 //////////////////////////////////////////////////////////////////////////////////

    public function index()
    {
        $mallsFromDB = Mall::all();
        return view("dashboard.malls.index", ["malls" =>$mallsFromDB]);
    }

   //////////////////////////////////////////////////////////////////////////////////

    public function create()
    {
        return view('dashboard.malls.create');
    }

   ////////////////////////////////////////////////////////////////////////////


   
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
       ]);

       return redirect()->route('malls.index')->with('success', 'Mall created successfully.');
   }


   //////////////////////////////////////////////////////////////////////////////////


    public function show($id)
    {
        $mall = Mall::where('mall_id', $id)->first();

        return view('dashboard.malls.show', compact('mall'));  
    
    }
    

    //////////////////////////////////////////////////////////////////////////////////

    public function edit($id)
    {
        $mall = Mall::where('mall_id', $id)->firstOrFail();
        return view('dashboard.malls.edit', compact('mall'));
    }
    


 //////////////////////////////////////////////////////////////////////////////////

 public function update(Request $request, $id)
 {
     $request->validate([
         'mall_name' => 'required',
         'mall_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         'mall_address' => 'required',
         'mall_descrbtion' => 'required',
     ]);
 
     $mall = Mall::where('mall_id', $id)->first();
 
     $img = $request->file('mall_image');
     if ($img) {
         $imgName = time() . '.' . $img->getClientOriginalExtension();
         $img->move(public_path('uploads/malls'), $imgName);
 
         if ($mall->mall_image) {
             unlink(public_path('uploads/malls/' . $mall->mall_image));
         }
     } else {
         $imgName = $mall->mall_image;
     }
 
     $mall->update([
         'mall_name' => $request->mall_name,
         'mall_image' => $imgName,
         'mall_address' => $request->mall_address,
         'mall_descrbtion' => $request->mall_descrbtion,
     ]);
 
     return redirect()->route('malls.index')->with('success', 'Mall updated successfully.');
 }
 
    
    //////////////////////////////////////////////////////////////////////////////////

    public function destroy($id)
    {
        $mall = Mall::where('mall_id', $id)->first();
        
        if ($mall) {
            $filePath = public_path('uploads/malls/' . $mall->mall_image);
            
            if (file_exists($filePath)) {
                unlink($filePath);
            }
    
            $mall->delete();
            return redirect()->route('malls.index')->with('success', 'Mall deleted successfully.');
        } else {
            return redirect()->route('malls.index')->with('error', 'Mall not found.');
        }
    }
    
    








}


