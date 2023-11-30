<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogController;

Route::prefix('blog')->group(function () {
    Route::get('/', [BlogController::class, 'index']);
    Route::get('/{id}', [BlogController::class, 'show']);  // Añadido '/' antes de '{id}'
    Route::post('/', [BlogController::class, 'store']);
    Route::put('/{id}', [BlogController::class, 'update']);  // Añadido '/' antes de '{id}'
    Route::delete('/{id}', [BlogController::class, 'destroy']);  // Añadido '/' antes de '{id}'
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
