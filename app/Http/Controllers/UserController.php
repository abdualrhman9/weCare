<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public function doctors(){
        $doctor_role = Role::find(1);
        $doctors = $doctor_role->users;
        return response()->json([$doctors]);
    }

    public function doctor_create(Request $request){
        return view('doctor.create');
    }

    public function doctor_store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email'=> 'required|email|unique:users',
            'password'=>'required|string|min:8|confirmed'
        ]);

        $doctor=User::create($data);

        $doctor->roles()->attach(2);

        if($request->has('accessToken')){
            $token = $doctor->createToken("adminCreator",['result:read']);
            return back()->with("token",$token->plainTextToken);
        }

        return redirect()->back();
    }

    public function patients(){
        $patient_role = Role::find(2);
        $patients = $patient_role->users;
        return response()->json([$patients]);
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
