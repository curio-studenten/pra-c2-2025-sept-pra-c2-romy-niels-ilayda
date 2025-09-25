<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function index(){

        return view('contact');
    }
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'message' => 'required|string',
        ]);

        ContactMessage::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Bericht is succesvol verzonden!');
    }
}

?>