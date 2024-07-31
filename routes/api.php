<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

// Route pro přihlášení a získání tokenu
Route::post('/login', [AuthController::class, 'login']);


Route::post('/posts', [PostController::class, 'store'])->middleware(['auth:sanctum']);
Route::get('/posts/{userId}', [PostController::class, 'index'])->middleware('auth:sanctum');

Route::get('/test', function () {
    return response()->json(['message' => 'Middleware is working']);
})->middleware('json.accept');;


