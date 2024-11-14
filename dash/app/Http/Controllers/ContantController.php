<?php

namespace App\Http\Controllers;

use App\Models\Contant;
use Illuminate\Http\Request;

class ContantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('landingpage.contact');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Contant $contant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contant $contant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contant $contant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contant $contant)
    {
        //
    }
}
