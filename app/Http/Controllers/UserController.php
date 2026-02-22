<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    // GET all users
    public function show()
    {
        try {
            $user = User::orderBy("id", "desc")->paginate(10);
            
            return response()->json([
                "status" => 200,
                "data" => $user
            ]);

        } catch (\Exception $e) {
            return response()->json([
                "status" => 500,
                "message" => $e->getMessage()
            ]);
        }
    }

    // GET user by ID
    public function detail($id)
    {
        try {
            $user = User::findOrFail($id);

            return response()->json([
                "status" => 200,
                "data" => $user
            ]);

        } catch (\Exception $e) {
            return response()->json([
                "status" => 404,
                "message" => "User tidak ditemukan"
            ]);
        }
    }

    // CREATE user (dengan profil)
    public function store(Request $request)
    {
        try {
            $request->validate([
                "name" => "required",
                "email" => "required|email|unique:users,email",
                "password" => "required|min:6",
                "nik" => "nullable",
                "jabatan" => "nullable",
                "bagian" => "nullable",
                "photo_profile" => "nullable|image"
            ]);

            // upload foto jika ada
            $photoPath = null;
            if ($request->hasFile('photo_profile')) {
                $photoPath = $request->file('photo_profile')
                    ->store('profiles', 'public');
            }

            $user = User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => Hash::make($request->password),
                "nik" => $request->nik,
                "jabatan" => $request->jabatan,
                "bagian" => $request->bagian,
                "photo_profile" => $photoPath ? asset('storage/' . $photoPath) : null
            ]);

            return response()->json([
                "status" => "success",
                "message" => "User berhasil dibuat",
                "data" => $user
            ]);

        } catch (\Exception $e) {
            return response()->json([
                "status" => 400,
                "message" => $e->getMessage()
            ]);
        }
    }

    // 🔥 UPDATE PROFILE USER LOGIN (FULL)
    public function update(Request $request)
    {
        try {
            $user = User::findOrFail(Auth::id());

            $request->validate([
                "name" => "required",
                "email" => "required|email|unique:users,email,".$user->id,
                "password" => "nullable|min:6",
                "nik" => "nullable",
                "jabatan" => "nullable",
                "bagian" => "nullable",
                "photo_profile" => "nullable|image"
            ]);

            // upload foto baru
            if ($request->hasFile('photo_profile')) {

                // hapus foto lama
                if ($user->photo_profile) {
                    Storage::disk('public')->delete($user->photo_profile);
                }

                $photoPath = $request->file('photo_profile')
                    ->store('profiles', 'public');

                $user->photo_profile = $photoPath;
            }

            $user->update([
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password
                    ? Hash::make($request->password)
                    : $user->password,
                "nik" => $request->nik,
                "jabatan" => $request->jabatan,
                "bagian" => $request->bagian
            ]);

            return response()->json([
                "status" => "success",
                "message" => "Profile berhasil diupdate",
                "data" => $user
            ]);

        } catch (\Exception $e) {
            return response()->json([
                "status" => 400,
                "message" => "Gagal update profile"
            ]);
        }
    }

    // 🔥 UPDATE PARTIAL PROFILE
    public function updatePartial(Request $request)
    {
        try {
            $user = User::findOrFail(Auth::id());

            $data = $request->only([
                'name',
                'email',
                'password',
                'nik',
                'jabatan',
                'bagian'
            ]);

            if (isset($data['password'])) {
                $data['password'] = Hash::make($data['password']);
            }

            $user->update($data);

            return response()->json([
                "status" => "success",
                "message" => "Profile berhasil diupdate sebagian",
                "data" => $user
            ]);

        } catch (\Exception $e) {
            return response()->json([
                "status" => 400,
                "message" => "Gagal update sebagian"
            ]);
        }
    }

    // DELETE user
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);

            if ($user->photo_profile) {
                Storage::disk('public')->delete($user->photo_profile);
            }

            $user->delete();

            return response()->json([
                "status" => "success",
                "message" => "User berhasil dihapus"
            ]);

        } catch (\Exception $e) {
            return response()->json([
                "status" => 404,
                "message" => "User tidak ditemukan"
            ]);
        }
    }

    // EXPORT Excel
    public function export()
    {
        try {
            Excel::store(new UsersExport(), "Reports.xlsx");
            return Excel::download(new UsersExport, 'users.xlsx');

        } catch (\Exception $e) {
            return response()->json([
                "status" => 400,
                "message" => "Gagal export data"
            ]);
        }
    }
}