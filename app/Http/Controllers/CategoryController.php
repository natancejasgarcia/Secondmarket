<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Muestra la lista de todas las categorías
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Muestra el formulario para crear una nueva categoría
    public function create()
    {
        return view('categories.create');
    }

    // Guarda una nueva categoría en la base de datos
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories|max:255',
            'description' => 'required',
        ]);

        $category = new Category($request->all());
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Categoría creada correctamente');
    }

    // Muestra una categoría específica
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view('categories.show', compact('category'));
    }

    // Muestra el formulario de edición para una categoría específica
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    // Actualiza una categoría en la base de datos
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:categories,name,' . $id,
            'description' => 'required',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Categoría actualizada correctamente');
    }

    // Elimina una categoría de la base de datos
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Categoría eliminada correctamente');
    }
}
