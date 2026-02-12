<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnitController extends Controller
{
    public function index()
    {
        try {
            $data = Unit::all();

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

            $data = Unit::create($request->only('name'));

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

    public function update(Request $request, $id)
    {
        try {
            $data = Unit::findOrFail($id);

            $data->update($request->only('name'));

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
            $data = Unit::findOrFail($id);
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
