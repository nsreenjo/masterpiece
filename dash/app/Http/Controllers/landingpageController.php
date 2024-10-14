<?php

namespace App\Http\Controllers;
use App\Models\Mall; 

use Illuminate\Http\Request;

class landingpageController extends Controller
{
    public function index()
    {
        $frontmalls = Mall::all();

        return view('landingpage.layout.app', compact('frontmalls'));
    }


    public function show($id)
    {
        $frontmalls = Mall::findOrFail($id);
        return view('landingpage.include.mall', compact('frontmalls'));
    }

}
