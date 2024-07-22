<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\View\View;
class categoriesController extends Controller


{
    public function index()
    {
        $categories = Categories::all();
        return view('layouts.categories', compact('categories'));
    }

    public function create()
    {
        return view('layouts.addCategory');
    }
    public function store(Request $request) 
    {
        $messages = $this->errMsg();

        $data=$request->validate([
            'title' => ['required', 'string', 'max:255'],
        ],$messages);
        Categories::create($data);
        return redirect('categories');
    }
    public function show(string $id)
    {
        $client = Categories::findOrFail($id);
        return view('layouts.categories', compact('categories'));
    }

        public function errMsg(){
            return [
                'title.required' => 'The Category title is missed, please insert',
            ];
            }
            public function edit(string $id)
            {

        $category = Categories::findOrFail($id);
        return view('layouts.editCategories', compact('categories'));
       
    }
    /**
     * Display a listing of the resource.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Categories::where('id',$id)->delete();
        return redirect('categories');
    }
    public function trash()
    {
        $trashed = Categories::onlyTrashed()->get();
        return view('trashCategory', compact('trashed'));
    }
    public function restore(string $id)
    {
        Categories::where('id',$id)->restore();
        return redirect('categories');
    }

}
