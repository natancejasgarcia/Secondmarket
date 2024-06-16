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
    public function index(Request $request)
    {
        // Obtener el término de búsqueda y filtros
        $search = $request->input('search');
        $category = $request->input('category');
        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');

        // Construir la consulta de productos
        $query = Product::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        if ($category) {
            $query->where('category_id', $category);
        }

        if ($min_price) {
            $query->where('price', '>=', $min_price);
        }

        if ($max_price) {
            $query->where('price', '<=', $max_price);
        }

        $products = $query->paginate(12);

        // Obtener todas las categorías para los filtros
        $categories = Category::all();

        // Retornar la vista con todos los productos
        return view('products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('createproduct.create', compact('categories'));
    }

    public function show($id)
    {
        $product = Product::with('user.reviews.reviewer')->findOrFail($id);
        return view('products.show', compact('product'));
    }
    public function buy($id)
    {
        $product = Product::findOrFail($id);
        return view('products.buy', compact('product'));
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
