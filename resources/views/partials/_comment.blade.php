<div id="accordion">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-12 mb-5">
            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0 text-center text-muted">Comments</h3>
                    <i class="fas fa-expand text-muted" id="headingOne" data-toggle="collapse" data-target="#collapseOne" 
                    aria-expanded="true" aria-controls="collapseOne"></i>
                </div>

                <div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        @include('partials._comment_replies', ['comments' => $note->comments, 'note_id' => $note->id])
                        <hr>
                        <h4 class="text-muted">New Comment</h4>
                        @error('comment_body')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <form action="{{ route('comment.add') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <textarea name="comment_body" class="form-control" placeholder="Type your comment" rows="5" required></textarea>
                                <input type="hidden" name="note_id" value="{{$note->id}}">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Comment">
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>