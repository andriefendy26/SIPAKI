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
    Route::post('/classification', [ClassificationsController::class, 'store']);
    
    // Units
    Route::get('/unit', [UnitController::class,'index']);
    Route::post('/unit', [UnitController::class,'store']);

    // Reports
    Route::get("/report", [ReportsController::class,"index"]);
    Route::post("/report", [ReportsController::class,"store"]);
    
    // Evidences
    Route::get("/evidence", [EvidenceController::class, "index"]);
    Route::post("/evidence", [EvidenceController::class, "store"]);

    

});

