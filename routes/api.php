<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/user',[UserController::class,'store'])
 ->middleware("auth:sanctum");


Route::middleware('auth:sanctum')->group(function (){
    // Auth
    Route::post("/login" ,[AuthController::class, 'Login']);
    Route::get('/logout', [AuthController::class,'Logout']);
    
    // Reports
    Route::get("/reports", [ReportsController::class,"index"]);
});

