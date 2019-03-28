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

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/home', function () {
        return view('home');
    });

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
    Route ::get('/citymanager', 'CityManagerController@index')
    ->name('citymanager.index');

    Route ::get('citymanager/get_citymanagerdata','CityManagerController@get_citymanagerdata');

    Route ::get('citymanager/create', 'CityManagerController@create')
    ->name('citymanager.create');

    Route ::post('/citymanager', 'CityManagerController@store')
    ->name('citymanager.store');

    Route ::get('/citymanager/{citymanager}/edit','CityManagerController@edit')
    ->name('citymanager.edit');

    Route ::patch('/citymanager/{citymanager}','CityManagerController@update')
    ->name('citymanager.update');

    Route::DELETE('/citymanager/{citymanager}','CityManagerController@destroy')
    ->name('citymanager.destroy');

    //---------------------------
    Route ::get('/gymmanager', 'GymManagerController@index')
    ->name('gymmanager.index');

    Route ::get('gymmanager/get_gymmanagerdata','GymManagerController@get_gymmanagerdata');

    Route ::get('gymmanager/create', 'GymManagerController@create')
    ->name('gymmanager.create');

    Route ::post('/gymmanager', 'GymManagerController@store')
    ->name('gymmanager.store');

    Route ::get('/gymmanager/{gymmanager}/edit','GymManagerController@edit')
    ->name('gymmanager.edit');

    Route ::patch('/gymmanager/{gymmanager}','GymManagerController@update')
    ->name('gymmanager.update');

    Route::DELETE('/gymmanager/{gymmanager}','GymManagerController@destroy')
    ->name('gymmanager.destroy');

    //---------------------------
    Route ::get('/gym', 'GymsController@index')
    ->name('gym.index');

    Route ::get('/gym/get_gymdata', 'GymsController@get_gymdata');

    Route ::get('/gym/create', 'GymsController@create')
    ->name('gym.create');

    Route ::post('/gym', 'GymsController@store')
    ->name('gym.store');

    Route ::get('/gym/{gym}/edit', 'GymsController@edit')
    ->name('gym.edit');

    Route ::patch('/gym/{gym}', 'GymsController@update')
    ->name('gym.update');

    Route::DELETE('/gym/{gym}', 'GymsController@destroy')
    ->name('gym.destroy');
    //________________cities_______________________//

    Route ::get('/city','CityController@index')
    ->name('city.index');

    Route ::get('/city/get_citydata','CityController@get_citydata');

    Route ::get('/city/create','CityController@create')
    ->name('city.create');

    Route ::post('/city','CityController@store')
    ->name('city.store');

    Route ::get('/city/{city}/edit','CityController@edit')
    ->name('city.edit');

    Route ::patch('/city/{city}','CityController@update')
    ->name('city.update');

    Route::DELETE('/city/{city}','CityController@destroy');

    //...................Training Sessions................//

    Route ::get('/trainingsession','TrainingSessionsController@index')
    ->name('trainingsession.index');

    Route ::get('/trainingsession/get_trainingsessiondata','TrainingSessionsController@get_trainingsessiondata');

    Route ::get('/trainingsession/create','TrainingSessionsController@create')
    ->name('trainingsession.create');

    Route ::post('/trainingsession','TrainingSessionsController@store')
    ->name('trainingsession.store');

    Route ::get('/trainingsession/{trainingsession}/edit','TrainingSessionsController@edit')
    ->name('trainingsession.edit');

    Route ::patch('/trainingsession/{trainingsession}','TrainingSessionsController@update')
    ->name('trainingsession.update');

    Route::DELETE('/trainingsession/{trainingsession}','TrainingSessionsController@destroy')
    ->name('trainingsession.destroy');
    //------------------------City--------------------
    Route ::get('/city','CityController@index')
    ->name('city.index');

    Route ::get('/city/get_citydata','CityController@get_citydata');

    Route ::get('/city/create','CityController@create')
    ->name('city.create');

    Route ::post('/city','CityController@store')
    ->name('city.store');

    Route ::get('/city/{city}/edit','CityController@edit')
    ->name('city.edit');

    Route ::patch('/city/{city}','CityController@update')
    ->name('city.update');

    Route::DELETE('/city/{city}','CityController@destroy');

    //----------------------- buy buckage ------------
    Route ::get('/buy_package', 'BuyPackageController@index')
    ->name('buy_package.index');

    Route ::get('/buy_package/get_packagedata', 'BuyPackageController@get_packagedata');

    Route ::get('/buy_package/{buy_package}/edit', 'BuyPackageController@edit')
    ->name('buy_package.edit');

    Route ::patch('/buy_package/{buy_package}', 'BuyPackageController@update')
    ->name('buy_package.update');

    //----------------------packages -------------------------//
    Route::get('/package', 'PackageController@index')
    ->name('package.index');

    Route::get('/package/create', 'PackageController@create')
    ->name('package.create');

    Route::post('/package','PackageController@store')
    ->name('package.store');
    Route ::get('/package/{package}/edit','PackageController@edit')
    ->name('package.edit');

    Route ::patch('/package/{package}','PackageController@update')
    ->name('package.update');

    Route::DELETE('/package/{package}','PackageController@destroy')
    ->name('package.destroy');

    Route ::get('/package/get_packagedata','PackageController@get_packagedata');
    //_________________________Users___________________________//
    Route ::get('/userweb','UsersController@index')
    ->name('userweb.index');
    Route::get('/userweb/create', 'UsersController@create')
    ->name('userweb.create');

    Route::post('/userweb','UsersController@store')
    ->name('userweb.store');
    Route ::get('/userweb/{userweb}/edit','UsersController@edit')
    ->name('userweb.edit');

    Route::patch('/userweb/{userweb}','UsersController@update')
    ->name('userweb.update');

    Route::DELETE('/userweb/{user}','UsersController@destroy')
    ->name('userweb.destroy');

    Route ::get('/userweb/get_userwebdata','UsersController@get_userwebdata');


});

//__________
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
