<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DoctorController extends Controller
{

    protected $guard = 'doctor';

    public function __construct()
    {
        // $this->middleware("auth")->except("index");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        return response()->json([$doctors]);
    }

    

    public function doctors(){
        $doctors = Doctor::all();
        return response()->json([$doctors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email'=> 'required|email|unique:users',
            'password'=>'required|string|min:8|confirmed',
            'work_location'=>'string|required',
            'phone_number'=>'required',
            'specialization'=>'required'
        ]);
        $data['password'] = bcrypt($data['password']);
        $doctor=Doctor::create($data);

        if($request->has('accessToken')){
            $token = $doctor->createToken("adminCreator",['result:read']);
            return back()->with("token",$token->plainTextToken);
        }

        return redirect()->back();
    }


    public function login(Request $request){
        $data = $request->validate([
            'email'=>'required|email',
            'password'=>'required',
            'device_name'=>'required'
        ]);
        $credintals = [
            'email' => $data['email'],
            'password'=>$data['password']
        ];
        if(Auth::guard('doctor')->attempt($credintals)){
            
            $doctor =Doctor::where('email',$credintals['email'])->first();
            $token = $doctor->createToken($data['device_name'])->plainTextToken;;

            return response()->json(["user"=>$doctor,"token"=>$token]);
            
        }
        return response()->json("Credintals Dosnot Match Our Records");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }

    public function patients(){
        $doctor = Auth::user();
        

        $patients = $doctor->users;
        return response()->json(['patients'=>$patients]);
    }

    public function patient_show(User $user){
        $user->load('reports.replies');
        return response()->json(['userReport'=>$user]);
    }

    public function dashbord(){
        $doctor = Auth::guard('doctor');
        return response()->json(['patients'=>$doctor->users]);
    }

    protected function guard(){
        return Auth::guard('doctor');
    }
}
