<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\Product;

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

    public function sendPurchaseRequest(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
            'product_id' => 'required|exists:products,id',
        ]);

        $product = Product::find($request->product_id);
        $sellerEmail = $product->user->email;

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'product' => $product->name,
            'price' => $product->price,
        ];

        // Envía el correo electrónico al vendedor
        Mail::to($sellerEmail)->send(new ContactMail($details));

        return redirect()->route('products.show', $product->id)->with('success', 'Solicitud de compra enviada exitosamente.');
    }
}
