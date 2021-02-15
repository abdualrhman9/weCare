<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    
    public function register(Request $request){
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed',
            "device_name"=>'required'
        ]);
        
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        
        $user->roles()->attch(2);

        $token = $user->createToken($data['device_name']);
        
        return response()->json([$user,$token]);
    }

    public function login(Request $request){
        
        $data = $request->validate([
            'email'=>'required|email',
            'password'=>'required',
            'device_name'=>'required'
        ]);

        $credintals = ['email' =>$data['email'],'password'=>$data['password']];
        
        if(Auth::attempt($credintals)){

            $token =Auth::user()->createToken($data['device_name'])->plainTextToken;

            return response()->json([auth()->user(),$token]);
            
        }
        return response()->json("Credintals Dosnot Match Our Records");
        

    }

    public function logout(Request $request){

        $user = auth()->user();
        $user->tokens()->delete();
        return response()->json(1);
    }
}
