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
Route::get('/results', function () {
    return view('results.index');
});
Route::get('/point-standings', function () {
    return view('point_standings.index');
});

Route::get('/admin', function() {
    return view('admin.index');
});

// Eloquent model => Post - usually a noun (doesn't have to be)
// controller => PostsController
// migration => create_posts_table

Route::get('/admin/announcements/create', 'AnnouncementController@create');


Route::get('/announcements', 'AnnouncementController@index');
Route::get('/announcements/{announcement}', 'AnnouncementController@show');


//Route::get('/', function () {
//
//});

//Route::get('announcements', 'AnnouncementController');
