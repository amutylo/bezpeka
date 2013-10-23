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

    Route::get('password/remind', array('as' => 'password.remind', 'uses' => 'LoginController@showReminderForm'));

    Route::post('password/remind', array('uses' => 'LoginController@sendReminder'));

    Route::get('password/reset/{token}', array('as' => 'password.reset', 'uses' => 'LoginController@showResetForm'));

    Route::post('password/reset/{token}', array('uses' => 'LoginController@resetPassword'));

});

// для всех маршрутов внутри будет прим фильтр 'admin_role_only' проверяться на логин
Route::group(array('before' => 'admin_role_only'), function(){

    Route::get('dashboard', array('as' => 'login.dashboard', 'uses' => 'LoginController@dashboard'));

    Route::resource('roles', 'RolesController');
    Route::resource('users', 'UsersController');

    Route::resource('users', 'UserController');

});

Route::filter('admin.auth', function()
{
    if (Auth::guest()) {
        return Redirect::to('login');
    }
});

Route::filter('admin_role_only', function(){
    if(!Auth::user()->isAdmin()){
        return Redirect::intended('/')->withMessage('У Вас недостаточно прав для доступа!');
    }
});

Route::filter('un_auth', function(){
    if(!Auth::guest()){
        Auth::logout();
    }
});

Route::filter('not_guest', function(){
    if (Auth::guest()) {
        return Redirect::intended('/')->withInput()->with('message', 'Вы должны войти, чтобы совершить это действие!');
    }
});

Route::filter('regular_user', function(){
    if (!Auth::guest()) {
        if (!Auth::user()->isRegular()) {
            return Redirect::back()->with('message', 'Вы не можете это делать, согласно Вашей роли на сайте!');
        }
    }
});



