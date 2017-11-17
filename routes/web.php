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

// Admin routes
Route::get('/admin', 'AdminController@index');

Route::get('/admin/announcements', 'AnnouncementController@index');
Route::get('/admin/announcements/create', 'AnnouncementController@create');
Route::get('/admin/announcements/{announcement}/edit', 'AnnouncementController@edit');
Route::post('/admin/announcements', 'AnnouncementController@store');
Route::patch('/admin/announcements/{announcement}', 'AnnouncementController@update');
Route::delete('admin/announcements/{id}', 'AnnouncementController@destroy');

Route::get('/admin/schedule', 'RaceScheduleController@index');
Route::get('/admin/schedule/create', 'RaceScheduleController@create');
Route::get('/admin/schedule/{id}/edit', 'RaceScheduleController@edit');
Route::post('/admin/schedule', 'RaceScheduleController@store');
Route::patch('/admin/schedule/{id}', 'RaceScheduleController@update');
Route::delete('admin/schedule/{id}', 'RaceScheduleController@destroy');

Route::get('/admin/classes', 'RaceClassController@index');
Route::get('/admin/classes/create', 'RaceClassController@create');
Route::get('/admin/classes/{id}/edit', 'RaceClassController@edit');
Route::post('/admin/classes', 'RaceClassController@store');
Route::patch('/admin/classes/{id}', 'RaceClassController@update');
Route::delete('admin/classes/{id}', 'RaceClassController@destroy');

// Public viewable routes
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

Route::get('/announcements', 'AnnouncementController@index');
Route::get('/announcements/{announcement}', 'AnnouncementController@show');


// Eloquent model => Post - usually a noun (doesn't have to be)
// controller => PostsController
// migration => create_posts_table

//Route::get('/', function () {
//
//});

//Route::get('announcements', 'AnnouncementController');
