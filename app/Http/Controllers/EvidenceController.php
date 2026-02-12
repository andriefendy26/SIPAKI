<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Evidence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EvidenceController extends Controller
{
    public function index()
    {
        try {
            $data = Evidence::with('report')->get();

            return response()->json([
                "status" => 200,
                "data" => $data,
                "message" => "Berhasil mengambil data"
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "status" => 400,
                "message" => $e->getMessage()
            ], 400);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'report_id' => 'required|exists:reports,id',
                'file_path' => 'required|string'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "status" => 422,
                    "message" => $validator->errors()
                ], 422);
            }

            $data = Evidence::create($request->only('report_id', 'file_path'));

            return response()->json([
                "status" => 200,
                "data" => $data,
                "message" => "Berhasil menambahkan data"
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "status" => 400,
                "message" => $e->getMessage()
            ], 400);
        }
    }
}
