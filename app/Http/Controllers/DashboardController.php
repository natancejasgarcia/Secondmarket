<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener el ID del usuario autenticado
        $userId = Auth::id();

        // Obtener los productos del usuario autenticado
        $products = Product::where('user_id', $userId)->get();

        // Retornar la vista del dashboard con los productos del usuario autenticado
        return view('dashboard', compact('products'));
    }

    public function create()
    {
        return view('dashboard.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $userId = Auth::id();
        $imagePath = $request->file('image')->store('public/images');

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'user_id' => $userId,
        ]);

        return redirect()->route('dashboard')->with('success', 'Producto creado correctamente.');
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('dashboard.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validar imagen opcional
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $product->image = $imagePath;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();

        return redirect()->route('dashboard')->with('success', 'Producto actualizado correctamente.');
    }
    public function destroy($id)
    {
        Log::info('Entering destroy method');
        $product = Product::findOrFail($id);
        $product->delete();
        Log::info('Product deleted: ' . $id);

        // Configurar el mensaje flash con SweetAlert
        Alert::success('Eliminado', 'Producto eliminado exitosamente');

        return redirect()->route('dashboard');
    }
}
