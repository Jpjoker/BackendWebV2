<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; 
use App\Mail\ContactFormMailable; 


class ContactController extends Controller
{
    public function contactPage()
    {
        return view('home.contactpage');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $mailable = new ContactFormMailable($request->nombre, $request->email, $request->message);

        Mail::to('admin@ehb.be')->send($mailable);

        return back()->with('success', 'Thanks for contacting us!');
    }
}
