@foreach ($comments as $comment)
    <div class="display-comment text-muted">
        <div class="d-flex">
            <strong>{{$comment->user->name}}</strong>
        </div>
        <p class="mb-2">{{$comment->body}}</p>
        <div id="form-wrapper">
            <form action="{{ route('reply.add') }}" method="POST">
                @csrf
                <div class="form-group">
                    {{-- <input type="text" name="comment_body" class="form-control" required> --}}
                    <textarea name="comment_body" class="form-control" rows="3" required>Type your reply</textarea>
                    <input type="hidden" name="note_id" value="{{$note_id}}">
                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-secondary" value="Reply">
                </div>
            </form>
        </div>
        @include('partials._comment_replies', ['comments' => $comment->replies])
    </div>
@endforeach