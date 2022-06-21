<?php
namespace App\Http\Controllers;

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

//login routes
Route::group(['middleware' => ['guest:web']], function () {
    Route::get('/login', 'Auth\AuthController@loginView')->name('index.login');
    Route::post('/login', 'Auth\AuthController@login')->name('login');
});
// register routes
Route::get('/register', 'Auth\AuthController@registerView')->name('index.register');
Route::post('/register', 'Auth\AuthController@register')->name('register');
Route::get('logout', 'Auth\AuthController@logout')->name('logout');
Route::redirect('/', '/login');





//put ur route inside this group ya hamada w eshtghl bel name
Route::group(['middleware' => ['auth:web']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile/{id}', 'UserController@index')->name('profile');
    Route::put('/profile/{id}', 'UserController@update')->name('profile.update');
    //posts
    Route::get('/post', 'PostController@create')->name('post.create');
    Route::post('/post', 'PostController@store')->name('post.store');
    Route::get('/post', 'UserController@index')->name('post');
    Route::get('/post/{id}/edit', 'PostController@edit')->name('post.edit');
    Route::put('/post/{id}', 'PostController@update')->name('post.update');
    Route::delete('/post/{id}', 'PostController@destroy')->name('post.destroy');
    //comments
   Route::get('post/{id}/comments/index','CommentController@index')->name('comments.index');
   Route::post('post/{id}/comments/store', 'CommentController@store')->name('comments.store');
   Route::delete('comment/{comment_id}', 'CommentController@destroy')->name('comment.destroy');
   //friends
   Route::get('friends/','FriendController@index')->name('friends.index');
   Route::get('friends/addfriend','FriendController@addfriend')->name('addfriend');
   Route::get('friends/addfriend/{id}/store','FriendController@sendfriendRequest')->name('addfriend.store');
  Route::get('friends/friendrequests/{id}/accept','FriendController@acceptFriend')->name('friendrequest.accept');
  Route::get('friends/friendrequests/{id}/reject','FriendController@rejectFriend')->name('friendrequest.reject');
  Route::get('friends/friendrequests/{id}/unfriend','FriendController@unfriend')->name('unfriend');

});




