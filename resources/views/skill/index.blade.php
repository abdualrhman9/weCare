@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    @forelse($skills as $skill)
                        
                            <div class="col-md-5 mt-4">
                            
                                <div class="card text-center">
                                <div class="card-header">
                                    <p class="h2">{{$skill->name}}</p>     
                                </div>
                                <div class="card-body">
                                    <img src="{{asset('storage/skills_img/'.$skill->image)}}" alt="avatar" style="height:100px" srcset="" >
                                </div>
                                </div>
                            
                            </div>
                        @empty
                        <p>No Skills</p>
                    @endforelse
                </div>

                
            </div>
        </div>
    </div>
@endsection