@extends('layouts.app')

@section('content')
<div class="bg-gradient-info create-note">
    <div class="container">
        <div class="row justify-content-center container-reposition">
            <div class="col-md-9 col-lg-12 mb-5">
                @error('title')
                    <div class="alert alert-danger my-1">{{$message}}</div>
                @enderror
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0 text-center text-muted">Create a Note</h3>
                    </div>
                    <div class="card-body">
                        <form action="/notes" method="POST">
                        
                            @csrf

                            <div class="form-group justify-content-center mb-4">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                            </div>

                            <div class="form-group justify-content-center">
                                <textarea id="textareanote" class="form-control note" name="note" rows="22"></textarea>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-success">Save Note</button>
                                <a class="btn btn-secondary" href="/notes">Back</a>
                            </div>
                            

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection