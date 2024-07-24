<?php

namespace App\Http\Controllers;
use App\Models\Beverages;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Traits\UploadFile;
class beverageController extends Controller
{
    use UploadFile;
    public function index()
    {
        $bevereges = Beverages::all();
        return view('layouts.beverages', compact('bevereges'));
    }
    // public function create()
    // {
    //     return view('layouts.addBevereg');
    // }

    public function create()
{
    $categories = Categories::all(); // Fetch all categories
    return view('layouts.addBevereg', compact('categories')); // Pass categories to the view
}

public function store(Request $request) 
{
    $data = $request->validate([
        'bname' => ['required', 'string', 'max:255'],
        'price' => ['required', 'numeric'],
        'descrip' => ['required', 'string', 'max:500'],
        'category_id' => ['required', 'exists:categories,id'], // This must be validated
        'image' => 'required|image|max:2048',
    ]);


    // Handle file upload
    $fileName = $this->upload($request->file('image'), 'assets/images');

    // Set the image name in the data array
    $data['image'] = $fileName;

    // Set special and published flags
    $data['special'] = isset($request->special);
    $data['published'] = isset($request->published);

    // Create the beverage record
    Beverages::create($data);

    // Redirect with success message
    return redirect()->route('beverages')->with('success', 'Beverage created successfully.');
}


    // public function store(Request $request) 
    // {
    //     $messages = $this->errMsg();

    //     $data=$request->validate([
    //         'bname' => ['required', 'string', 'max:255'],
    //         'price' => ['required', 'string', 'max:255'],
    //         'descrip' => ['required', 'string', 'max:500'],
    //         'category' => ['required', 'string', 'max:255'],
    //         'image' => 'required',
    //     ],$messages);

    //     $fileName = $this->upload($request->image, 'assets/images');

    //     $data['image'] = $fileName;

    //     $data['special'] = isset($request->special);
    //     $data['published'] = isset($request->special);
    //     Beverages::create($data);
    //     return redirect('bevereges');
    // }
    public function show(string $id)
    {
        $bevereges = Beverages::findOrFail($id);
        return view('showBeverages', compact('bevereges'));
    }
    public function edit(string $id)
    {
        $bevereges = Beverages::findOrFail($id);
        return view('editBevereg', compact('bevereges'));
    }
    public function update(Request $request, string $id)
    {
        $messages = $this->errMsg();
        $data = $request->validate([
            'bname' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
            'descrip' => ['required', 'string', 'max:500'],
            'category' => ['required', 'string', 'max:255'],
            'image' => 'required',
        ], $messages);

        if($request->hasFile('image')){
            $fileName = $this->upload($request->image, 'assets/images');
            $data['image'] = $fileName;
      
        }
        $data['special'] = isset($request->special);
        $data['published'] = isset($request->special);
        
        Beverages::where('id', $id)->update($data);
        return redirect('bevereges');
    }
    
    public function destroy(Request $request)
    {
        $id = $request->id;
        Beverages::where('id',$id)->delete();
        return redirect('beverages');
    }
    public function trash()
    {
        $trashed = Beverages::onlyTrashed()->get();
        return view('trashBevereg', compact('trashed'));
    }

    public function delete( Beverages $bevereges){
        $bevereges->delete();
        return back();
    }
    public function restore(string $id)
    {
        Beverages::where('id',$id)->restore();
        return redirect('beverages');
    }

    // error custom messages
    public function errMsg(){
        return [
            'name.required' => 'The Beverag name is missed, please insert',
        ];
    }
    
}
