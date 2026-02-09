<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function show(){
        $user =  User::orderBy("id","desc")->paginate(10);
        return response()->json($user);
    }

    public function store(Request $request){
        // $user = User::create($request->all());
        // $request;

        $request->validate([
            "name",
            "email",
            "password",
        ]);

        $user = User::create([
            "name"=> $request->name,
            "email"=> $request->email,
            "password"=> bcrypt($request->password),
        ]);
        $user->save();
        return response()->json([
            "status" => "success",
            "data" => $user
        ]);
    }
}
