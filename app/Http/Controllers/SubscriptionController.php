<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionMail;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // Envía el correo electrónico
        Mail::to($request->email)->send(new SubscriptionMail());

        return redirect()->back()->with('success', 'Te has suscrito exitosamente.');
    }
}
