<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Nicolaslopezj\Searchable\SearchableTrait;

class User extends Authenticatable
{

    /**
     *  Extract all the Friendable logic to a trait
     */
    use Notifiable, Friendable, SearchableTrait;

    /**
     *  User search
     */
    protected $searchable = [
        'columns' => [
            'users.name' => 10
        ]
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     *  Relationship between User and Note
     */
    public function note() 
    {
        return $this->hasMany(Note::class)->orderBy('created_at', 'desc');
    }

    /**
     *  Getting allowed user
     */
    public function allowed() {
        $friendIds = $this->friends()->pluck('id');
        $allowed = User::whereIn('id', $friendIds)->latest()->paginate(5, ['*'], 'friends');
        return $allowed;
    }

}
