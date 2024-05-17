<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;

class ProductController extends Controller
{
    public function index()
    {
        // Obtener todos los productos
        $products = Product::all();

        // Retornar la vista con todos los productos
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('createproduct.create', compact('categories'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function store(Request $request)
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para realizar esta acción.');
        }

        // Validar los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Subir la imagen
        $imagePath = $request->file('image')->store('public/images');

        // Crear el producto en la base de datos
        Product::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'image' => $imagePath,
            'category_id' => $validatedData['category_id'],
            'user_id' => Auth::id(),
        ]);

        // Después de crear el producto, muestra una notificación
        Alert::success('Éxito', '¡Producto creado exitosamente!');

        return redirect()->route('createproduct.create');
    }
}
