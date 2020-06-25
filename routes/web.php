<?php

use App\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', function () {
    return view('welcome', [
        'user' => auth()->user()
    ]);
});

Auth::routes();

Route::resource('notes', 'NotesController');

Route::get('users', 'NotelyUsersController@search');

Route::post('/users/{user}/friend', 'FriendsController@store');

Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');
