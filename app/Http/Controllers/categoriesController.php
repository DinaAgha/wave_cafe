<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\View\View;
class categoriesController extends Controller
{
    public function index()
    {
        $clients = Categories::get();
        return view('layouts.categories', compact('categories'));
    }

    public function create(): View
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
        return redirect('layouts.categories');
    }
    public function show(string $id)
    {
        $client = Categories::findOrFail($id);
        return view('showCategory', compact('categories'));
    }

        public function errMsg(){
            return [
                'title.required' => 'The Category title is missed, please insert',
            ];
            }
            public function edit(string $id)
            {

        $category = Categories::findOrFail($id);
        return view('layouts.categories', compact('categories'));
       
    }
    /**
     * Display a listing of the resource.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Categories::where('id',$id)->delete();
        return redirect('layouts.categories');
    }
    public function trash()
    {
        $trashed = Categories::onlyTrashed()->get();
        return view('trashCategory', compact('trashed'));
    }

    /**
     * Remove the specified resource from storage.
     */

}
