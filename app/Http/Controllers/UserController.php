<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    //
    public function show(){
        $user =  User::orderBy("id","desc")->paginate(10);
        return response()->json($user);
    }

    public function store(Request $request){
        $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required",
        ]);

        $user = User::create([
            "name"=> $request->name,
            "email"=> $request->email,
            "password"=> bcrypt($request->password),
        ]);
        $user->save();
        return response()->json([
            "status" => "success",
            "message" => "Berhasil Mendaftar",
            "data" => $user
        ]);
    }

    public function export() 
    {
        Excel::store(New UsersExport(), "y.xlsx");
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
