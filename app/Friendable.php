<?php

namespace App;

/**
 *  A trait of User Model
 */
trait Friendable
{

    /**
     *  Method to friend a user
     */
    public function friend(User $user) {

        return $this->friends()->save($user);
    }

    /**
     *  Method to unfriend a user
     */
    public function unFriend(User $user) {
        return $this->friends()->detach($user);
    }

    /**
     *  Method to add and remove friends
     */
    public function toggleFriend(User $user) {
        if ($this->friending($user)) {
            return $this->unFriend($user);
        }
        return $this->friend($user);
    }

    /**
     *  Relationship between a user and friends
     */
    public function friends() {
        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_user_id');
    }

    /**
     *  Method to see if users are friends
     *  @param $user is the user we are checking against
     */
    public function friending(User $user) {
        return $this->friends()->where('friend_user_id', $user->id)->exists();
    }
}
