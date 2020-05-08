<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');

Route::get('prueba', function (){
    return view('layouts.blog-post');
});

Route::get('posts/{id}', 'PostController@post')->name('posts.post');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::resource('users', 'UserController');
    Route::resource('categories', 'CategoryController');
    Route::resource('posts', 'PostController');
    Route::resource('medias', 'MediaController');
    Route::resource('comments', 'CommentController');
    Route::resource('replies', 'ReplyController');
});

Route::group(['middleware' => 'auth'],  function () {
    Route::post('comments/reply', 'ReplyController@reply')->name('replies.reply');
});


