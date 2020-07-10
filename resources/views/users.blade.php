@extends('layouts.app')

@section('content')

<div class="notes-index bg-gradient-info">
    <div class="container">
        <div class="row justify-content-center container-reposition">
            <div class="col-md-9 mb-5">
        
                <div class="card">
        
                    <div class="card-header">
                        <h3 class="mb-0 text-center text-muted">Note Access</h3>
                        <p class="text-muted text-center mb-0">Choose which users can view your notes</p>
                    </div>
        
                    <div class="card-body">

                        {{-- Search --}}
                        <form action="{{ url('/users') }}" method="GET">
                            <div class="row mb-4">
                                <div class="col-8 col-lg-10">
                                    <input type="text" name="search" class="form-control" placeholder="Search">
                                </div>
                                <div class="col-4 col-lg-2 text-center">
                                    <button class="btn btn-success">Search</button>
                                </div>
                            </div>
                        </form>

                        {{-- User List --}}
                        <ul class="list-group">
                            @foreach ($users as $user)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
        
                                    <div class="d-flex flex-column justify-content-start align-items-start">
                                        <h3 class="my-1">{{$user->name}}</h3>
                                        <div>
                                            Member Since <span class="font-weight-bold text-muted">
                                                {{date("F, j, Y", strtotime($user->created_at))}}</span>
                                        </div>
                                    </div>
        
                                    <div>
                                        @if (auth()->user()->isnot($user))
                                            <form action="/users/{{$user->id}}/friend" method="POST">
                                                @csrf
                                                <button type="submit" 
                                                class= "btn btn-sm ml-2 {{auth()->user()->friending($user) ? "btn-danger" : "btn-success"}}">
                                                        {{auth()->user()->friending($user) ? 'Deny' : 'Allow'}}
                                                </button>
                                            </form> 
                                        @endif
                                    </div>
        
                                </li>   
                            @endforeach
                        </ul>

                        {{-- Pagination Links --}}
                        <div id="bootstrap-override" class="mt-4">
                            {{ $users->links() }}
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection