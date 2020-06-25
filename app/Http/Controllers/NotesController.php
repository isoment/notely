<?php

namespace App\Http\Controllers;

use App\Note;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class NotesController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $currentUser = auth()->user()->id;
        $friendNotes = auth()->user()->friendsNotes();

        // Since there are two cards listing users notes and friends notes and we are using
        // pagination on both in the same view we need to change the query string for pagination
        // for at least one of them
        $notes = Note::where('user_id', $currentUser)->
                 orderBy('created_at', 'desc')->
                 paginate(5, ['*'], 'me');

        return view('notes', [
            'notes' => $notes,
            'friendNotes' => $friendNotes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createnotes');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:50'
        ]);

        $note = new Note;
        $note->title = $request->input('title');
        $note->note = $request->input('note');
        $note->user_id = auth()->user()->id;

        $note->save();

        return redirect('/notes')->with('success', 'New Note Created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $note = Note::findOrFail($id);

        // Show note
        return view('shownote')->with('note', $note);

        // Redirect to edit page
        // return redirect('/notes/' . $note->id . '/edit');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = Note::findOrFail($id);

        return view('editnote')->with('note', $note);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required|max:50'
        ]);

        $note = Note::findOrFail($id);

        $note->title = $request->input('title');
        $note->note = $request->input('note');
        $note->user_id = auth()->user()->id; 

        $note->save();

        return redirect('/notes/' . $note->id . '/edit')->with('success', 'Note Saved!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Note::findOrFail($id);

        $note->delete();

        return redirect('/notes')->with('success', 'Note Deleted!');
    }

}
