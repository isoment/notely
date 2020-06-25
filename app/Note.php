<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model

{

    use Friendable;

    /**
     *  Attributes that are mass assignable
     */
    protected $fillable =[
        'title', 'note'
    ];

    /**
     *  Relationship between Note and User
     */
    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    /**
     *  Relationship between Note and Comment
     */
    public function comments() 
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }


}
