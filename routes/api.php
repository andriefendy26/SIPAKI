<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassificationsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\EvidenceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

// Auth
Route::post("/login", [AuthController::class, 'login']);
Route::post("/logout", [AuthController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES (SANCTUM)
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Classifications
    |--------------------------------------------------------------------------
    */
    Route::get('/classification', [ClassificationsController::class, 'index']);
    Route::post('/classification', [ClassificationsController::class, 'store']);
    Route::get('/classification/{id}', [ClassificationsController::class, 'show']);
    Route::put('/classification/{id}', [ClassificationsController::class, 'update']);
    Route::delete('/classification/{id}', [ClassificationsController::class, 'destroy']);

    /*
    |--------------------------------------------------------------------------
    | Units
    |--------------------------------------------------------------------------
    */
    Route::get('/unit', [UnitController::class,'index']);
    Route::post('/unit', [UnitController::class,'store']);
    Route::get('/unit/{id}', [UnitController::class,'show']);
    Route::put('/unit/{id}', [UnitController::class,'update']);
    Route::delete('/unit/{id}', [UnitController::class,'destroy']);

    /*
    |--------------------------------------------------------------------------
    | Reports
    |--------------------------------------------------------------------------
    */
    Route::get("/report", [ReportsController::class,"index"]);
    Route::post("/report", [ReportsController::class,"store"]);
    Route::get("/report/{id}", [ReportsController::class,"show"]);
    Route::put("/report/{id}", [ReportsController::class,"update"]);
    Route::delete("/report/{id}", [ReportsController::class,"destroy"]);

    /*
    |--------------------------------------------------------------------------
    | Evidences
    |--------------------------------------------------------------------------
    */
    Route::get('/evidence', [EvidenceController::class,'index']);
    Route::post('/evidence', [EvidenceController::class,'store']);
    Route::get('/evidence/{id}', [EvidenceController::class,'show']);
    Route::put('/evidence/{id}', [EvidenceController::class,'update']);
    Route::delete('/evidence/{id}', [EvidenceController::class,'destroy']);

});
