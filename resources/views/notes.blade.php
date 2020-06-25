@extends('layouts.app')

@section('content')
<div class="notes-index bg-gradient-info">
    <div class="container">

        {{-- Notes List --}}
        <div class="row justify-content-center container-reposition">
            <div class="col-md-9">
                @include('inc.messages')
                <div class="card">

                    <div class="card-header">
                        <h3 class="mb-0 text-center text-muted">{{auth()->user()->name}}'s Notes</h3>
                    </div>
    
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($notes as $note)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
    
                                    <div class="d-flex flex-column justify-content-start align-items-start">
                                        <a href="/notes/{{$note->id}}/edit" class="text-decoration-none text-secondary">
                                            <h3 class="my-1 notes-title">{{Str::of($note->title)->limit(35)}}</h3>
                                        </a>
                                        <span class="font-weight-bold text-muted">
                                              {{date("F j, Y", strtotime($note->created_at))}}</span>
                                    </div>
    
                                    <div>
                                        <form action="/notes/{{$note->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-danger btn-sm ml-2"
                                                    onclick="return confirm('Delete Note? This cannot be undone')">Delete</button>
                                        </form> 
                                    </div>
    
                                </li>   
                            @endforeach
                        </ul>

                        <div id="bootstrap-override" class="mt-4 ml-3">
                            {{ $notes->links() }}
                        </div>

                    </div>
                    
                </div>
            </div>
        </div>

        {{-- Friend Notes --}}
        <div id="accordion">
            <div class="row justify-content-center container-reposition pb-5 pt-5">
                <div class="col-md-9">
                    <div class="card">

                        <div class="card-header d-flex justify-content-between align-items-center">
                             <h3 class="mb-0 text-center text-muted">Your Friend's Notes</h3>
                             <i class="fas fa-expand text-muted" id="headingOne" data-toggle="collapse" data-target="#collapseOne" 
                             aria-expanded="true" aria-controls="collapseOne"></i>
                        </div>

                        <div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <ul class="list-group">
                                
                                    @forelse ($friendNotes as $friendNote)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
        
                                            <div>
                                                <a href="/notes/{{$friendNote->id}}" class="text-decoration-none text-secondary">
                                                    <h3 class="my-1 notes-title">{{Str::of($friendNote->title)->limit(35)}}</h3>
                                                    <span class="font-weight-bold text-muted">Written by: {{$friendNote->user->name}}</span>
                                                    <br><span class="font-weight-bold text-muted">
                                                        {{date("F j, Y", strtotime($friendNote->created_at))}}</span>
                                                </a>
                                            </div>
        
                                        </li>
                                    @empty
                                        <h3 class="text-muted">You don't have any friends with notes yet.</h3>
                                    @endforelse
                    
                                </ul>
                                <div id="bootstrap-override" class="mt-4 ml-3">
                                    {{ $friendNotes->links() }}
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection