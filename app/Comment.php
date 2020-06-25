<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     *  Relationship between Comment and User
     */
    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    /**
     *  Relationship between Comments for reply functionality
     */
    public function replies() 
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
