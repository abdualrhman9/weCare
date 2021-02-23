<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $patient_role = Role::find(2);
        $patients = $patient_role->users;
        return response()->json([$patients]);
    }


    public function link(Request $request,Doctor $user){
        $user = Auth::user();
        if($user->doctors()->attach($user->id)){
            return response()->json(['message'=>'success']);
        }

        return response()->json(['message'=>'fail']);
    }

    public function checklink(Request $request,Doctor $doctor){
        $doctor = Auth::user();
        if($doctor->doctors->first){
            return response()->json(['message'=>"this patien has adoctor attached to","status"=>true]);
        }else{
            return response()->json(["message"=>'No Doctor hasbeen attached to patient',"status"=>false]);
        }
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
        
        $user->roles()->attach(2);

        $token = $user->createToken($data['device_name'],['result:send']);
        
        return response()->json(["user"=>$user,"token"=>$token]);
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

            return response()->json(["user"=>auth()->user(),"token"=>$token]);
            
        }
        return response()->json("Credintals Dosnot Match Our Records");
        

    }

    public function logout(Request $request){

        $user = auth()->user();
        $user->tokens()->delete();
        return response()->json(1);
    }
}
