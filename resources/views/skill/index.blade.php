@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center h4">
                        Skills List
                    </div>
                    <div class="card-body">
                        <ul>
                            @forelse($skills as $skill)
                                <li>
                                    <a href="nav-link">
                                        <h2>{{$skill->name}}</h2>
                                        <img src="{{asset('storage/skills_img/'.$skill->image)}}" alt="avatar" width="20%" height="20%" srcset="">
                                    </a>
                                </li>
                                @empty
                                <li> No Skills At The Moment :  <a href="{{route('home')}}">return</a></li>
                                
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection