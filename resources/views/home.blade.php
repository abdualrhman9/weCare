@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body text-center">
                    <div class="row justify-content-center">
                        <div class="card">
                            <div class="card-header">
                                Skills Control
                            </div>
                            <div class="card-body">
                                <a href="{{route('skill.create')}}" class="btn btn-dark mr-2"> Create Skill </a>
                                <a href="{{route('skill.index')}}" class="btn btn-dark "> Skills List</a>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-4">
                       <div class="card">
                            <div class="card-header">
                                Instantiate Control
                            </div>
                            <div class="card-body">
                                <a href="{{route('doctor.create')}}" class="btn btn-dark mr-2">Spawon  Doctor </a>
                                <a href="{{route('doctor.index')}}" class="btn btn-dark ">Doctor List </a>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
