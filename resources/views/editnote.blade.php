@extends('layouts.app')

@section('content')

    <div class="bg-gradient-info edit-note">
        <div class="container">
            <div class="row justify-content-center container-reposition">
                <div class="col-md-9 col-lg-12 mb-5">
                    @error('title')
                        <div class="alert alert-danger my-1">{{$message}}</div>
                    @enderror
                    @include('inc.messages')
    
                    {{-- Per Note Policy checking if user is the notes author --}}
                    @can('update', $note)
                        <div class="card mb-5">
                            <div class="card-header">
                                <h3 class="mb-0 text-center text-muted">{{$note->title}}</h3>
                            </div>
                            <div class="card-body">
                                <form action="/notes/{{$note->id}}" method="POST">
                                
                                    @csrf
    
                                    @method('PATCH')
    
                                    <div class="form-group justify-content-center mb-4">
                                        <input type="text" class="form-control" id="title" name="title" value="{{$note->title}}">
                                    </div>
    
                                    <div class="form-group justify-content-center">
                                        <textarea id="textareanote" class="form-control note" name="note" rows="22">{{$note->note}}</textarea>
                                    </div>
    
                                    <div class="d-flex justify-content-between">
                                        <button type="submit" class="btn btn-success">Save Note</button>
                                        <a class="btn btn-secondary" href="/notes">Back</a>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>

                        @include('partials._comment')
                    @endcan
    
                    @cannot('update', $note)
                        <div class="card">
                            <h4 class="text-center m-3 text-muted">You cannot edit this note!</h4>
                        </div>
                    @endcannot
    
                </div>
            </div>
        </div>
    </div>


            


@endsection