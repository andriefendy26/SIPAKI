<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Evidence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatisticsController extends Controller
{
    public function index()
    {
        try {

            $totalReport = Report::count();

            $totalEvidence = Evidence::count();

            $avgCapaian = Report::avg('realization');

            return response()->json([
                "status" => 200,
                "data" => [
                    "total_report" => $totalReport,
                    "total_evidence" => $totalEvidence,
                    "avg_capaian" => round($avgCapaian, 2)
                ],
                "message" => "Berhasil mengambil statistik"
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "status" => 500,
                "message" => "Gagal mengambil statistik",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function ShowByUser()
    {
        try {
            $userId = Auth::id();
            $totalReport = Report::where('user_id', $userId)->count();
            $totalEvidence = Evidence::whereHas('report', function ($q) use ($userId) {
                $q->where('user_id', $userId);
            })->count();
            $avgCapaian = Report::where('user_id', $userId)
                                ->avg('realization');

            return response()->json([
                "status" => 200,
                "data" => [
                    "total_report" => $totalReport,
                    "total_evidence" => $totalEvidence,
                    "avg_capaian" => round($avgCapaian ?? 0, 2)
                ],
                "message" => "Berhasil mengambil statistik user login"
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "status" => 500,
                "message" => "Gagal mengambil statistik",
                "error" => $e->getMessage()
            ], 500);
        }
    }


}