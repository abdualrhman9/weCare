@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <legend> Add New Skill </legend>
                <form action="{{route('skill.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="image">image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="section">Section</label>
                        <select name="section_id" id="section" class="form-control">
                            <option selected disabled>select section </option>
                            @foreach ($sections as $section)
                                <option value="{{$section->id}}">{{$section->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="steps">Steps</label>
                        <textarea name="steps" id="steps" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Add Skill">
                    </div>
                </form>
            </div>
            
        </div>
    </div>
    

@endsection