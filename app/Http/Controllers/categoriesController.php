<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all(); // Fetch all categories
        return view('layouts.categories', compact('categories')); // Pass categories to the view
    }

    public function create()
    {
        return view('layouts.addCategory');
    }

    public function store(Request $request)
    {
        $request->validate([

            'title' => ['required', 'string', 'max:255'],
        ]);

        Categories::create($request->all());

        return redirect()->route('categories')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $categories= Categories::findOrFail($id);
        return view('layouts.editCategories', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        $categories = Categories::findOrFail($id);
        $categories->update($request->all());

        return redirect()->route('categories')->with('success', 'Category updated successfully.');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:categories,id',
        ]);

        Categories::destroy($request->id);

        return redirect()->route('categories')->with('success', 'Category deleted successfully.');
    }

    public function delete(Categories $category){
        $category->delete();
        return back();
    }
    public function trash()
    {
        $trashed = Categories::onlyTrashed()->get();
        return view('trashCategory', compact('trashed'));
    }

    public function restore($id)
    {
        $categories = Categories::onlyTrashed()->findOrFail($id);
        $categories->restore();
        return redirect()->route('categories')->with('success', 'Category restored successfully.');
    }
}
