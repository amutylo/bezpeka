<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('logout', array('as' => 'login.logout', 'uses' => 'LoginController@logout'));
Route::group(array('before' => 'un_auth'), function(){
    Route::get('login', array('as' => 'login.index', 'uses' => 'LoginController@index'));
    Route::get('register', array('as' => 'login.register', 'uses' => 'LoginController@register'));
    Route::post('login', array('uses' => 'LoginController@login'));
    Route::post('register', array('uses' => 'LoginController@store'));
});

// для всех маршрутов внутри будет прим фильтр 'admin.auth' проверяться на логин
Route::group(array('before' => 'admin.auth'), function(){
    Route::get('dashboard', function(){
        return View::make('login.dashboard');
    });
    Route::resourse('roles', 'RolesController');

});
Route::filter('admin.auth', function(){
    if(Auth::guest()){
        return Redirect::to('login');
    }
});
Route::filter('un_auth', function(){
    if(!Auth::guest){
        Auth::logout();
    }
});
Route::resource('roles', 'RolesController');