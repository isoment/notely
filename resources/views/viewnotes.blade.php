@extends('layouts.app')

@section('content')
    <div class="notes-index bg-gradient-info">
        <div class="container">
            <div class="row justify-content-center container-reposition">
                <div class="col-md-9 mb-5">
            
                    <div class="card">
            
                        <div class="card-header">
                            <h3 class="mb-0 text-center text-muted">View Notes</h3>
                            <p class="text-muted text-center mb-0">You can view and comment these notes</p>
                        </div>
            
                        <div class="card-body">

                            {{-- Search --}}
                            <form action="{{ url('/view') }}" method="GET">
                                <div class="row mb-4">
                                    <div class="col-8 col-lg-10">
                                        <input type="text" name="search" class="form-control" placeholder="Search">
                                    </div>
                                    <div class="col-4 col-lg-2 text-center">
                                        <button class="btn btn-success">Search</button>
                                    </div>
                                </div>
                            </form>

                            <ul class="list-group">
                                @foreach ($notes as $note)
                                    <li class="list-group-item">
                                        <div class="d-flex flex-column justify-content-start align-items-start">
                                            <a href="/notes/{{$note->id}}"><h3 class="my-1">{{$note->title}}</h3></a>
                                            <div>By: {{$note->user->name}}</div>
                                            <div>
                                                Created <span class="font-weight-bold text-muted">
                                                    {{date("F, j, Y", strtotime($note->created_at))}}</span>
                                            </div>
                                        </div>
                                    </li>   
                                @endforeach
                            </ul>

                            <div id="bootstrap-override" class="mt-4">
                                {{ $notes->links() }}
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection