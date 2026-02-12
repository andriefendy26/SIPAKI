<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function index()
    {
        try {
            $data = Report::with(['classification', 'unit', 'evidence'])
                        ->latest()
                        ->get();

            return response()->json([
                "status" => 200,
                "data" => $data,
                "message" => "Berhasil mengambil data laporan"
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "status"=> 400,
                "message" => $e->getMessage()
            ], 400);
        }
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        $classification = [
            1, 2
        ];

        try {
            $validator = Validator::make($request->all(), [
                'classification_id' => 'required|exists:classifications,id',
                'unit_id'           => 'required|exists:units,id',
                'report_date'       => 'required|date',
                'description'       => 'required|string',
                'target'            => 'required|numeric',
                'realization'       => 'required|numeric',
                'achievement'       => 'required|numeric'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "status" => 422,
                    "message" => $validator->errors()
                ], 422);
            }

            $data = Report::create($request->all());

            DB::commit();

            return response()->json([
                "status" => 200,
                "data" => $data,
                "message"=> "Berhasil menambahkan data laporan"
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                "status"=> 400,
                "message" => $e->getMessage()
            ], 400);
        }
    }

    public function show($id)
    {
        try {
            $data = Report::with(['classification', 'unit', 'evidence'])
                        ->findOrFail($id);

            return response()->json([
                "status" => 200,
                "data" => $data,
                "message" => "Berhasil mengambil detail laporan"
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "status"=> 400,
                "message" => "Data tidak ditemukan"
            ], 400);
        }
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $data = Report::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'classification_id' => 'required|exists:classifications,id',
                'unit_id'           => 'required|exists:units,id',
                'report_date'       => 'required|date',
                'description'       => 'required|string',
                'target'            => 'required|numeric',
                'realization'       => 'required|numeric',
                'achievement'       => 'required|numeric'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "status" => 422,
                    "message" => $validator->errors()
                ], 422);
            }

            $data->update($request->all());

            DB::commit();

            return response()->json([
                "status" => 200,
                "data" => $data,
                "message"=> "Berhasil mengupdate data"
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                "status"=> 400,
                "message" => $e->getMessage()
            ], 400);
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $data = Report::findOrFail($id);

            // hapus evidence terkait jika perlu
            $data->evidence()->delete();

            $data->delete();

            DB::commit();

            return response()->json([
                "status" => 200,
                "message" => "Berhasil menghapus data laporan"
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                "status"=> 400,
                "message" => $e->getMessage()
            ], 400);
        }
    }
}
