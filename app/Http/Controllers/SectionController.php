<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{

    public function __construct()
    {
        // $this->middleware("auth:sanctum");
    }

    public function index(){
        $sections = Section::all();
        $sections->load("skills");
        // dd($sections);
        return response()->json([$sections]);
    }

    public function show(Section $section){
        $section->load("skills");
        return response()->json([$section]);
    }
}
