<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
        // $this->middleware("auth:sanctum");
    }
    public function register(Request $request){
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed',
            "device_name"=>'required'
        ]);

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        
        $token = $user->createToken($data['device_name']);
        
        return response()->json(['user'=>$user,$data['device_name']=>$token]);
    }

    public function login(Request $request){
        $data = $request->validate([
            'email'=>'required|email',
            'password'=>'required',
            'device_name'=>'required'
        ]);

        if(!Auth::attempt($data)){
            
            return response()->json(['message'=>"Credintals Dosnot Match Our Records"]);
        }

        $token =Auth::user()->createToken($data['device_name'])->plainTextToken;

        return response()->json(['user'=>auth()->user(),$data['device_name']=>$token]);

    }

    public function logout(Request $request){

        $user = auth()->user();
        $user->tokens()->delete();
        return response()->json([1]);
    }
}
