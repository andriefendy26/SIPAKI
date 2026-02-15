<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassificationsController;
use App\Http\Controllers\EvidenceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\UnitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



 // Auth
Route::post("/login" ,[AuthController::class, 'Login']);
Route::get('/logout', [AuthController::class,'Logout']);

Route::middleware('auth:sanctum')->group(function (){
    // Classifications
    Route::get('/classification', [ClassificationsController::class, 'index']);
    Route::get('/classification/{id}', [ClassificationsController::class, 'index']);
    Route::post('/classification', [ClassificationsController::class, 'store']);
    Route::put('/classification/{id}', [ClassificationsController::class,'update']);
    Route::delete('/classification/{id}', [ClassificationsController::class, 'destroy']);

    // Units
    Route::get('/unit', [UnitController::class,'index']);
    Route::put('/unit/{id}',[UnitController::class, 'update']);
    Route::post('/unit', [UnitController::class,'store']);
    Route::delete('/unit/{id}', [UnitController::class,'destroy']);

    // Reports
    Route::get("/report", [ReportsController::class,"index"]);
    Route::get("/report/{id}", [ReportsController::class,"show"]);
    Route::post("/report", [ReportsController::class,"store"]);
    Route::put("/report/{id}", [ReportsController::class,"update"]);
    Route::delete("/report/{id}", [ReportsController::class,"destroy"]);

    // Evidences
    Route::get("/evidence", [EvidenceController::class, "index"]);
    Route::post("/evidence", [EvidenceController::class, "store"]);
    Route::delete("/evidence/{id}", [EvidenceController::class,"destroy"]);
});

