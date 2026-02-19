<?php

use App\Http\Controllers\EvidenceController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/reports/export', [ReportsController::class, 'exportView']);

Route::get('/evidences/export', [EvidenceController::class,'exportView']);


//user route
// Route::middleware(EnsureTokenIsValid::class)->group(function () {
//     Route::get('/user',[UserController::class, 'show']);
//     Route::post('/user',[UserController::class,'store']);
// });  