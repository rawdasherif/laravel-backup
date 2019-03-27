<?php

/*
|----------------------------------------Route::get('/posts/create', 'PostsController@create')
->name('posts.create');----------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/coach', 'CoachController@index')
->name('coach.index');

Route::get('/coach/create', 'CoachController@create')
->name('coach.create');

Route::post('/coach','CoachController@store')
->name('coach.store');
Route ::get('/coach/{coach}/edit','CoachController@edit')
->name('coach.edit');

Route ::patch('/coach/{coach}','CoachController@update')
->name('coach.update');

Route::DELETE('/coach/{coach}','CoachController@destroy')
->name('coach.destroy');

Route ::get('/coach/get_coachdata','CoachController@get_coachdata');

Route::get('/coach/{coach}','CoachController@show')
->name('coach.show');
// --------------------------
Route ::get('/citymanager','CityManagerController@index')
->name('citymanager.index');

Route ::get('citymanager/create','CityManagerController@create')
->name('citymanager.create');

Route ::post('/citymanager','CityManagerController@store')
->name('citymanager.store');
//---------------------------
Route ::get('/gymmanager','GymManagerController@index')
->name('gymmanager.index');

Route ::get('gymmanager/get_gymmanagerdata','GymManagerController@get_gymmanagerdata');

Route ::get('gymmanager/create','GymManagerController@create')
->name('gymmanager.create');

Route ::post('/gymmanager','GymManagerController@store')
->name('gymmanager.store');

Route ::get('/gymmanager/{gymmanager}/edit','GymManagerController@edit')
->name('gymmanager.edit');

Route ::patch('/gymmanager/{gymmanager}','GymManagerController@update')
->name('gymmanager.update');

Route::DELETE('/gymmanager/{gymmanager}','GymManagerController@destroy')
->name('gymmanager.destroy');

//---------------------------
 Route ::get('/gym','GymsController@index')
->name('gym.index');

Route ::get('/gym/get_gymdata','GymsController@get_gymdata');

Route ::get('/gym/create','GymsController@create')
->name('gym.create');

Route ::post('/gym','GymsController@store')
->name('gym.store');

Route ::get('/gym/{gym}/edit','GymsController@edit')
->name('gym.edit');

Route ::patch('/gym/{gym}','GymsController@update')
->name('gym.update');

Route::DELETE('/gym/{gym}','GymsController@destroy')
->name('gym.destroy');
//________________cities_______________________//
Route ::get('/city','CityController@index')
->name('city.index');

Route ::get('/city/get_citydata','CityController@get_citydata');

Route ::get('/city/create','CityController@create')
->name('city.create');

Route ::post('/city','GymsController@store')
->name('city.store');

// Route ::get('/city/{city}/edit','CityController@edit')
// ->name('city.edit');

// Route ::patch('/city/{city}','CityController@update')
// ->name('city.update');

// Route::DELETE('/city/{city}','CityController@destroy');



