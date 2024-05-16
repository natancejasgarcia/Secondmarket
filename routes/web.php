<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\DashboardController;
// Rutas de autenticación
require __DIR__ . '/auth.php';

// Ruta principal
Route::get('/', function () {
    $categories = Category::all(); // Cargar todas las categorías
    $products = Product::latest()->take(9)->get(); // Obtener los últimos 9 productos
    return view('welcome', compact('categories', 'products'));
})->name('welcome');
// Ruta del Dashboard con middleware de autenticación y verificación
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Rutas relacionadas con el perfil del usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas para categorías y productos
Route::middleware('auth')->group(function () {
    Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

    // Rutas para productos
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create'); // Ruta para mostrar el formulario de creación
    Route::post('/products', [ProductController::class, 'store'])->name('products.store'); // Ruta para almacenar el nuevo producto
    // Ruta para mostrar un producto específico
    Route::get('/products/{id}', 'ProductController@show')->name('products.show');
    //Ruta para todos los productos
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/create', [DashboardController::class, 'create'])->name('dashboard.create');
    Route::post('/dashboard', [DashboardController::class, 'store'])->name('dashboard.store');
    Route::get('/dashboard/{id}', [DashboardController::class, 'show'])->name('dashboard.show');
    Route::get('/dashboard/{id}/edit', [DashboardController::class, 'edit'])->name('dashboard.edit');
    Route::put('/dashboard/{id}', [DashboardController::class, 'update'])->name('dashboard.update');
    Route::delete('/dashboard/{id}', [DashboardController::class, 'destroy'])->name('dashboard.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Rutas para las conversaciones
    Route::get('/conversations', [ConversationController::class, 'index']);
    Route::get('/conversations/{conversation}', [ConversationController::class, 'show']);
    Route::post('/conversations', [ConversationController::class, 'store']);

    // Rutas para los mensajes
    Route::get('/conversations/{conversation}/messages', [MessageController::class, 'index']);
    Route::post('/conversations/{conversation}/messages', [MessageController::class, 'store']);
    Route::get('/messages/create/{userId}', [MessageController::class, 'create'])->name('messages.create');
    Route::get('/conversations/{conversation}', [ConversationController::class, 'show'])->name('conversations.show');
    Route::post('/conversations/{conversation}/messages', [MessageController::class, 'store'])->name('conversations.messages.store');
    Route::get('/conversations', [ConversationController::class, 'index'])->name('conversations.index');
});
