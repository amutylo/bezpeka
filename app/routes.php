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

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));
Route::get('catalog', array('as' => 'catalog', 'uses' => 'CatalogController@index'));
Route::get('about_us', array('as' => 'about_us', 'uses' => 'HomeController@about_us'));

Route::get('logout', array('as' => 'login.logout', 'uses' => 'LoginController@logout'));
Route::group(array('before' => 'un_auth'), function(){
    Route::get('login', array('as' => 'login.index', 'uses' => 'LoginController@index'));
    Route::get('register', array('as' => 'login.register', 'uses' => 'LoginController@register'));
    Route::post('login', array('uses' => 'LoginController@login'));
    Route::post('register', array('uses' => 'LoginController@store'));
});

// для всех маршрутов внутри будет прим фильтр 'admin.auth' проверяться на логин
Route::group(array('before' => 'admin.auth'), function(){
    Route::get('dashboard', array('as' => 'login.dashboard', 'uses' => 'LoginController@dashboard'));
    Route::resource('roles', 'RolesController');
    Route::resource('users', 'UsersController');

});
Route::filter('admin.auth', function(){
    if(Auth::guest()){
        return Redirect::to('login');
    }
});
Route::filter('un_auth', function(){
    if(!Auth::guest()){
        Auth::logout();
    }
});
