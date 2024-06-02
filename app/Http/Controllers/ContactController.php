<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        // Envía el correo electrónico
        Mail::to('ecomarketofficial1@gmail.com')->send(new ContactMail($details));

        return redirect()->back()->with('success', 'Mensaje enviado exitosamente.');
    }
}
