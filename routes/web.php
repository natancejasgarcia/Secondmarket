<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\DashboardController;
use App\Models\Category;
use App\Models\Product;

// Rutas de autenticación
require __DIR__ . '/auth.php';

// Ruta principal
Route::get('/', function () {
    $categories = Category::all();
    $products = Product::latest()->take(9)->get();
    return view('welcome', compact('categories', 'products'));
})->name('welcome');

// Ruta del Dashboard con middleware de autenticación y verificación
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Ruta de contacto
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/instagram', function () {
    return view('instagram');
})->name('instagram');
// Rutas públicas para categorías y productos
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// Rutas relacionadas con el perfil del usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas para la gestión de productos dentro del Dashboard (requieren autenticación)
Route::middleware('auth')->group(function () {
    Route::get('/create', [ProductController::class, 'create'])->name('createproduct.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/dashboard/create', [DashboardController::class, 'create'])->name('dashboard.create');
    Route::post('/dashboard', [DashboardController::class, 'store'])->name('dashboard.store');
    Route::get('/dashboard/{id}', [DashboardController::class, 'show'])->name('dashboard.show');
    Route::get('/dashboard/{id}/edit', [DashboardController::class, 'edit'])->name('dashboard.edit');
    Route::put('/dashboard/{id}', [DashboardController::class, 'update'])->name('dashboard.update');
    Route::delete('/dashboard/{id}', [DashboardController::class, 'destroy'])->name('dashboard.destroy');


    // Rutas para las conversaciones
    Route::get('/conversations', [ConversationController::class, 'index'])->name('conversations.index');
    Route::get('/conversations/{conversation}', [ConversationController::class, 'show'])->name('conversations.show');
    Route::post('/conversations', [ConversationController::class, 'store']);

    // Rutas para los mensajes
    Route::get('/conversations/{conversation}/messages', [MessageController::class, 'index']);
    Route::post('/conversations/{conversation}/messages', [MessageController::class, 'store']);
    Route::get('/messages/create/{userId}', [MessageController::class, 'create'])->name('messages.create');
    Route::post('/conversations/{conversation}/messages', [MessageController::class, 'store'])->name('conversations.messages.store');
});
