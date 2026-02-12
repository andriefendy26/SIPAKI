<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Classification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClassificationsController extends Controller
{
    public function index()
    {
        try {
            $data = Classification::all();

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
                'name' => 'required|string|max:255'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "status" => 422,
                    "message" => $validator->errors()
                ], 422);
            }

            $data = Classification::create([
                'name' => $request->name
            ]);

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

    public function show($id)
    {
        try {
            $data = Classification::findOrFail($id);

            return response()->json([
                "status" => 200,
                "data" => $data,
                "message" => "Berhasil mengambil detail data"
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "status" => 400,
                "message" => "Data tidak ditemukan"
            ], 400);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = Classification::findOrFail($id);

            $data->update([
                'name' => $request->name
            ]);

            return response()->json([
                "status" => 200,
                "data" => $data,
                "message"=> "Berhasil mengupdate data"
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "status"=> 400,
                "message" => $e->getMessage()
            ], 400);
        }
    }

    public function destroy($id)
    {
        try {
            $data = Classification::findOrFail($id);
            $data->delete();

            return response()->json([
                "status" => 200,
                "message" => "Berhasil menghapus data"
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "status" => 400,
                "message" => $e->getMessage()
            ], 400);
        }
    }
}
