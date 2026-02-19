<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Evidence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Excel;

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
                'file_path' => 'required|image|mimes:png,jpg,jpeg,gif,webp'
            ]);


            if ($validator->fails()) {
                return response()->json([
                    "status" => 422,
                    "message" => $validator->errors()
                ], 422);
            };

            //ambil file
            $file = $request->file('file_path');;

            //membuat nama unik
            $filename = time() . '_' .$file->getClientOriginalName();
        
            //store file dan membuat path
            $path = Storage::disk('public')->put('/images', $file);

            $data = Evidence::create([
                'report_id' => $request->report_id,
                'file_path' => $path,
            ]);
            // $data = Evidence::create($request->only('report_id', 'file_path'));

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

    public function exportView()
    {
        
        return view('exports.evidences', [
            'title' => 'Data Bukti',
            'headings' => ['ID', 'Nama Bukti', 'Deskripsi', 'Tanggal Dibuat', 'Tanggal Diperbarui'],
            'fields' => ['id', 'name', 'description', 'created_at', 'updated_at'],
            'reports' => Evidence::all()
        ]);
    }
}
