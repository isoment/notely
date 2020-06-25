<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Note;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     *  Store Comment
     */
    public function store(Request $request) 
    {
        $validate = $request->validate([
            'comment_body' => 'required',
        ]);

        $comment = new Comment;

        $comment->body = $validate['comment_body'];
        $comment->user()->associate($request->user());

        $note = Note::find($request->get('note_id'));
        $note->comments()->save($comment);

        return back();
    }

    /**
     *  Store Reply
     */
    public function replyStore(Request $request) 
    {
        $validate = $request->validate([
            'comment_body' => 'required',
        ]);

        $reply = new Comment;

        $reply->body = $validate['comment_body'];
        $reply->user()->associate($request->user());

        $reply->parent_id = $request->get('comment_id');
        $note = Note::find($request->get('note_id'));

        $note->comments()->save($reply);

        return back();
    } 
}
