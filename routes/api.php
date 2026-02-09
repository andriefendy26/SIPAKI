<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

 Route::post('/user',[UserController::class,'store'])
 ->middleware("auth:sanctum");



// Auth
Route::post("/login" ,[AuthController::class, 'Login']);
Route::get('/logout', [AuthController::class,'Logout'])
    ->middleware("auth:sanctum");