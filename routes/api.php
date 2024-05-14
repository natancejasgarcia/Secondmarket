<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

// Asegúrate de que MessageController tenga un método 'unreadCount'
Route::middleware('auth:api')->get('/unread-messages-count', [MessageController::class, 'unreadCount']);
