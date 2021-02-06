@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <div class="row">
                        <a href="{{route('skill.create')}}" class="btn btn-dark mr-2"> Create Skill </a>
                        <a href="{{route('skill.index')}}" class="btn btn-dark "> Skills List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
