<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ItemController;
use App\Http\Controllers\API\UserController;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('users', [UserController::class, 'index']);
Route::get('users/{user}', [UserController::class, 'show']);

Route::get('categories', [CategoryController::class, 'show']);
// Route::get('items', [ItemController::class, 'index'])->middleware('auth:sanctum');
Route::get('items', [ItemController::class, 'index']);
Route::get('items/{item}', [ItemController::class, 'show']);

Route::post('/tokens/create', function (Request $request) {
    $token = request()->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});
