<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Skill;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SkillController extends Controller
{

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
            'image'=>'required|file',
            'steps'=>'required',
            "section_id"=>'required'

        ]);
        
        $image_name = Carbon::now()->format('h_m_s'). $data['image']->getClientOriginalName();

        $data['image'] = $request->image->storeAs("public/uploads",$image_name);

        $skill = Skill::create($data);

        return redirect("skill");
    }
}
