<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FriendsController extends Controller
{

    /**
     *  Method to have user friend @param
     */
    public function store(User $user) {
        auth()->user()->toggleFriend($user);
        return back();
    }

}
