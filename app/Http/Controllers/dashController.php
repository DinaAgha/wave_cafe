<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class dashController extends Controller
{
 
    public function index()
    {
      $users = User::get();
      return view('layouts.users', compact('users'));
    }
    
    public function create()
    {
        return view('layouts.addUser');
    }
    public function store(Request $request)
    {
        $messages = $this->errMsg();

        $data = $request->validate([
            'name' => 'required|max:100|min:5',
            'username' => 'required|max:100|min:5',
            'email' => 'required|email:rfc',
            'password' => 'required|min:8',
        ], $messages);
        $data['active'] = isset($request->active);
        User::create($data);
        return redirect('users');
    }
    public function errMsg(){
        return [
            'name.required' => 'The Full name is missed, please insert',
            'name.min' => 'length less than 5, please insert more chars',
            'username.required' => 'The User name is missed, please insert',
            'username.min' => 'length less than 5, please insert more chars',
            'email.required' =>'The Email Adress is missed, please insert',
            'password.min' => 'length less than 8, please insert more chars',
        ];
    }
    public function edit(string $id)
    {
        $users = User::findOrFail($id);
        return view('layouts.editUsers', compact('users'));
    }

    public function update(Request $request, string $id)
    {
        $messages = $this->errMsg();
        $data = $request->validate([
            'name' => 'required|max:100|min:5',
            'username' => 'required|max:100|min:5',
            'email' => 'required|email:rfc',
            'password' => 'required|min:8',
        ], $messages);
        $data['active'] = isset($request->active);
        User::create($data);
        return redirect('users');
    }
    public function destroy(Request $request)
    {
        $id = $request->id;
        User::where('id',$id)->delete();
        return redirect('users');
    }
    public function trash()
    {
        $trashed = User::onlyTrashed()->get();
        return view('trashUser', compact('trashed'));
    }
    public function restore(string $id)
    {
        User::where('id',$id)->restore();
        return redirect('users');
    }

}
