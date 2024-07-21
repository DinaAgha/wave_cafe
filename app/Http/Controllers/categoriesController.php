<?php

namespace App\Http\Controllers;

use App\Http\Models\Categories;
use App\Traits\UploadFile;

use Illuminate\Http\Request;

class categoriesController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.main', compact('categories'));
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
    public function show(Categories $active)
    {
        // $message->read = 1;
        // $message->save()
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin)
    {
        //
    }
}
