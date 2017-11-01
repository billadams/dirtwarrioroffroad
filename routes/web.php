<?php

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

Route::get('/', function () {

    return view('home');
});

Route::get('/schedule', function () {
    return view('schedule.index');
});

// Eloquent model => Post - usually a noun (doesn't have to be)
// controller => PostsController
// migration => create_posts_table

Route::get('/announcements', 'AnnouncementController@index');
Route::get('/announcements/{announcement}', 'AnnouncementController@show');

//Route::get('/', function () {
//
//});

//Route::get('announcements', 'AnnouncementController');
