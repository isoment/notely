<?php

namespace App\Http\Controllers;

use App\User;
use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FriendsController extends Controller
{
    /**
     *  Method to have user friend @param
     */
    public function store(User $user) 
    {
        auth()->user()->toggleFriend($user);
        return back();
    }

    /**
     *  View allowed notes
     */
    public function view(Request $request) 
    {
        $authUser = auth()->user()->id;
        // Get users who allowed current user
        $getUsers = DB::table('friends')->where('friend_user_id', $authUser)->pluck('user_id');

        $search = $request['search'];

        if ($request->has('search')) {
            $notes = Note::search($search)->whereIn('user_id', $getUsers)->paginate(10);
        } else {
            $notes = Note::whereIn('user_id', $getUsers)->paginate(10);
        }

        return view('viewnotes', [
            'notes' => $notes,
        ]);
    }
}
