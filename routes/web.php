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
Route::get('/admin/login', 'Admin\SessionsController@create');
Route::post('/admin/login', 'Admin\SessionsController@store');
Route::get('/admin/logout', 'Admin\SessionsController@destroy');

Route::get('/admin', 'Admin\AdminController@index')->name('dashboard');

Route::get('/admin/announcements', 'Admin\AnnouncementController@index');
Route::get('/admin/announcements/create', 'Admin\AnnouncementController@create');
Route::get('/admin/announcements/{announcement}/edit', 'Admin\AnnouncementController@edit');
Route::post('/admin/announcements', 'Admin\AnnouncementController@store');
Route::patch('/admin/announcements/{announcement}', 'Admin\AnnouncementController@update');
Route::delete('admin/announcements/{id}', 'Admin\AnnouncementController@destroy');

Route::get('/admin/schedule', 'Admin\RaceScheduleController@index');
Route::get('/admin/schedule/create', 'Admin\RaceScheduleController@create');
Route::get('/admin/schedule/{id}/edit', 'Admin\RaceScheduleController@edit');
Route::post('/admin/schedule', 'Admin\RaceScheduleController@store');
Route::patch('/admin/schedule/{id}', 'Admin\RaceScheduleController@update');
Route::delete('admin/schedule/{id}', 'Admin\RaceScheduleController@destroy');

Route::get('/admin/classes', 'Admin\RaceClassController@index');
Route::get('/admin/classes/create', 'Admin\RaceClassController@create');
Route::get('/admin/classes/{id}/edit', 'Admin\RaceClassController@edit');
Route::post('/admin/classes', 'Admin\RaceClassController@store');
Route::patch('/admin/classes/{id}', 'Admin\RaceClassController@update');
Route::delete('admin/classes/{id}', 'Admin\RaceClassController@destroy');

Route::get('/admin/results', 'Admin\RaceResultController@index');
Route::get('/admin/results/create', 'Admin\RaceResultController@create');
Route::get('/admin/results/{result}/edit', 'Admin\RaceResultController@edit');
Route::post('/admin/results', 'Admin\RaceResultController@store');
Route::patch('/admin/results/{id}', 'Admin\RaceResultController@update');
Route::delete('admin/results/{id}', 'Admin\RaceResultController@destroy');

Route::get('/admin/resultpositions/{result}', 'Admin\RaceResultPositionController@index');
Route::get('/admin/resultpositions/create', 'Admin\RaceResultPositionController@create');
Route::get('/admin/resultpositions/{result}/edit', 'Admin\RaceResultPositionController@edit');
Route::post('/admin/resultpositions', 'Admin\RaceResultPositionController@store');
Route::patch('/admin/resultpositions/{id}', 'Admin\RaceResultPositionController@update');
Route::delete('admin/resultpositions/{id}', 'Admin\RaceResultPositions@destroy');

Route::get('/admin/racers/{result}', 'RacerController@index');
Route::get('/admin/racers/create', 'RacerController@create');
Route::get('/admin/racers/{result}/edit', 'RacerController@edit');
Route::post('/admin/racers', 'RacerController@store');
Route::patch('/admin/racers/{id}', 'RacerController@update');
Route::delete('admin/racers/{id}', 'RacerController@destroy');

// Public viewable routes
Route::get('/', 'HomeController@index');

//Route::get('/', function () {
//    return view('home');
//});

Route::get('/schedule', 'RaceScheduleController@index');

Route::get('/results', 'RaceResultController@index');
Route::get('/results/{event}', 'RaceResultController@show');

Route::get('/point-standings', function () {
    return view('point_standings.index');
});

Route::get('/announcements', 'AnnouncementController@index');
Route::get('/announcements/{announcement}', 'AnnouncementController@show');

Route::get('/directions', function() {
   return view('directions.index');
});
Route::get('/about', function() {
    return view('about.index');
});

// Eloquent model => Post - usually a noun (doesn't have to be)
// controller => PostsController
// migration => create_posts_table