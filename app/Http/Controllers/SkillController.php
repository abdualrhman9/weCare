<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Section;
use App\Models\Skill;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{

    

    /**
     * 
     * main skills for root user
     * 
     */

     public function home(Request $request){
        $skills = Skill::simplepaginate(10);
        return view('skill.index',compact('skills'));
    }


    /**
     * 
     */
    public function show(Request $request,Skill $skill){
        return response()->json($skill);
    }


    /**
     *  main skills for api user
     * @var Request
     * 
     */
    public function index(Request $request){
        $skills = Skill::all();
        return response()->json(['skills'=>$skills]);
    }


    public function create(Request $request){

        $this->authorize("create",Skill::class);
        $sections = Section::all();
        return view("skill.create",compact("sections"));
    }

    public function store(Request $request){
        $this->authorize('create',Skill::class);
        $data = $request->validate([
            'name'=>'required',
            'image'=>'required|image',
            'steps'=>'required',
            "section_id"=>'required'

        ]);
        
        $image_name = Carbon::now()->format('h_m_s'). $data['image']->getClientOriginalName();

        $data['image'] = $request->image->storeAs("public/skills_img/",$image_name);
        $data['image'] = $image_name;
        $skill = Skill::create($data);
        return redirect()->back();
    }

    public function send(Request $request,Skill $skill){
        $user = Auth::user();
        $report = $user->reports()->create(
            [
                'resulte'=>$request->resulte,
                'skill_id'=> $skill->id,
        ]);


        return response()->json(['message'=>'Success','report'=>$report]);


    }
}
