@extends('layouts.app')

@section('content')

    <div class="bg-gradient-info edit-note">
        @if ($note->user->friending(auth()->user()))
            <div class="container">

                <div class="row justify-content-center container-reposition">
                    <div class="col-md-9 col-lg-12 mb-5">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="mb-0 text-center text-muted">{{$note->title}}</h3>
                            </div>
                            <div class="card-body">
                                <form action="/">

                                    <div class="form-group justify-content-center mb-4">
                                        <input type="text" class="form-control" id="title" name="title" value="{{$note->title}}">
                                    </div>

                                    <div class="form-group justify-content-center">
                                        <textarea id="unsaveable" class="form-control note" name="note" rows="22">{{$note->note}}</textarea>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
        
                    </div>
                </div>

                @include('partials._comment')

            </div>
        @else 
            <div class="container">
                <div class="row justify-content-center container-reposition">
                    <div class="col-md-9 col-lg-12 mb-5">
                        <div class="card">
                            <h4 class="mb-0 text-center text-muted p-3">You cannot view this note!</h4>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>

@endsection