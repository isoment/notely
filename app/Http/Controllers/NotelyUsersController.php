<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class NotelyUsersController extends Controller
{
    /**
     *  Show and search the Users
     */
    public function search(Request $request) {

        $search = $request['search'];

        if ($request->has('search')) {
            $users = User::search($search)->paginate(10);
        } else {
            $users = User::paginate(10);
        }

        return view('users')->with('users', $users);
    }
}
