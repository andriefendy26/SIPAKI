<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassificationsController;
use App\Http\Controllers\EvidenceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\UnitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



 // Login
Route::post("/login" ,[AuthController::class, 'Login']);

Route::middleware('auth:sanctum')->group(function (){
    // Logout
    Route::get('/logout', [AuthController::class,'Logout']);
    
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
    Route::patch("/report/{id}", [ReportsController::class,"updatePartial"]);
    Route::delete("/report/{id}", [ReportsController::class,"destroy"]);

    // Evidences
    Route::get("/evidence", [EvidenceController::class, "index"]);
    Route::post("/evidence", [EvidenceController::class, "store"]);
    Route::delete("/evidence/{id}", [EvidenceController::class,"destroy"]);

    Route::get("/user", [UserController::class,"show"]);
    Route::post("/user", [UserController::class,"store"] );

    });
    // Export to PDF

    // User
    Route::get('/users/export/', [UserController::class, 'export']);
    Route::get('/reports/export', [ReportsController::class,'export']);
    