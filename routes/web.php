<?php

use App\Http\Controllers\EvidenceController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Collection;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth:sanctum')->group(function (){
    Route::get('/evidences/export', [EvidenceController::class,'exportView']);
    Route::get('/reports/export', [ReportsController::class, 'exportView']);
    Route::get('/mr/export', function () {
   
        $indikatorPekerjaan = collect([
            ['aktivitas' => 'Aktivitas 1', 'target' => 100, 'realisasi' => 90, 'satuan' => 'Unit', 'nilai_capaian' => 90],
            ['aktivitas' => 'Aktivitas 2', 'target' => 200, 'realisasi' => 180, 'satuan' => 'Unit', 'nilai_capaian' => 90],
            ['aktivitas' => 'Aktivitas 3', 'target' => 150, 'realisasi' => 150, 'satuan' => 'Unit', 'nilai_capaian' => 100],
        ]);

        return view('exports.mr',['indikatorPekerjaan'=>$indikatorPekerjaan]);
    });
    Route::get('/iki/export', function () {
        $user = Auth::user();
        $tahun = date('Y');

        $indikatorPekerjaan = collect([
            ['aktivitas' => 'Aktivitas 1', 'target' => 100, 'realisasi' => 90, 'satuan' => 'Unit', 'nilai_capaian' => 90],
            ['aktivitas' => 'Aktivitas 2', 'target' => 200, 'realisasi' => 180, 'satuan' => 'Unit', 'nilai_capaian' => 90],
            ['aktivitas' => 'Aktivitas 3', 'target' => 150, 'realisasi' => 150, 'satuan' => 'Unit', 'nilai_capaian' => 100],
        ]);

        $indikatorDisiplin = collect([
            ['indikator' => 'Kehadiran', 'target' => 100, 'realisasi' => 95, 'satuan' => '%', 'nilai_capaian' => 95],
            ['indikator' => 'Kepatuhan Terhadap Prosedur', 'target' => 100, 'realisasi' => 90, 'satuan' => '%', 'nilai_capaian' => 90],
            ['indikator' => 'Kerjasama Tim', 'target' => 100, 'realisasi' => 85, 'satuan' => '%', 'nilai_capaian' => 85],
        ]);

        return view('exports.iki', compact('user', 'tahun', 'indikatorPekerjaan', 'indikatorDisiplin'));
    });
});
