<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Msg;

class ContactController extends Controller
{
    // Method to display all messages
    public function index()
    {
        $messages = Msg::all(); // Fetch all messages from the database
        
        return view('layouts.messages', compact('messages')); // Pass messages to the view
    }
  

    public function count()
    {
        $unreadMessages = Msg::where('read', false)->get();
        return view('adminIncludes.topnav', compact('unreadMessages'));
    }
    // Method to create a new message (show the contact form)
    public function create()
    {
        return view('layouts.contact'); // Return the contact form view
    }

    // Method to store a new message

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'clientname' => 'required|string|max:255',
            'clientemail' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Create a new message
        Msg::create([
            'clientname' => $request->clientname,
            'clientemail' => $request->clientemail,
            'message' => $request->message,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
    // public function store(Request $request)
    // {
    //     $messages = $this->errMsg();

    //     $data = $request->validate([
    //         'clientname' => 'required|string|max:255',
    //         'clientemail' => 'required|email|max:255',
    //         'message' => 'required|string',
    //     ], $messages);

    //     Msg::create($data); // Store the message in the database
    //     return redirect()->route('contact.create')->with('success', 'Your message has been sent successfully!');
    // }

    // // Method to show details of a specific message
    // public function show(Msg $message)
    // {
    //     return view('layouts.message-details', compact('message'));
    // }
    public function show($id)
{
    $message = Msg::findOrFail($id); // Fetch the message or fail with a 404
    return view('layouts.message', compact('message')); // Pass the message to the view
}

    // Method to return custom error messages
    public function errMsg()
    {
        return [
            'clientname.required' => 'The Full name is missed, please insert',
            'clientemail.required' => 'The Email Address is missed, please insert',
            'message.required' => 'The message is missed, please insert',
        ];
    }

    // Method to display trashed messages
    public function trash()
    {
        $trashed = Msg::onlyTrashed()->get();
        return view('trashMsg', compact('trashed'));
    }
}
