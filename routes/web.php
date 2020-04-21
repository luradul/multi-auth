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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Admin routes
Route::namespace('Admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/','LoginController@showLoginForm')->name('admin.login');
        Route::post('/','LoginController@login');
        Route::get('register','RegisterController@showRegistrationForm')->name('admin.register');
        Route::post('register','RegisterController@register');

        //Dashboard routes
        Route::get('dashboard','DashboardController@index')->name('admin.dashboard');
    });

    Route::prefix('admin-password')->group(function () {
        Route::post('email','ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
        Route::get('reset','ForgotPasswordController@showLinkRequestForm')->name('admin.password.update');
        Route::post('reset','ResetPasswordController@reset');
        Route::get('reset/{token}','ResetPasswordController@showResetForm')->name('admin.password.reset');
    });
});

Route::namespace('Visitor')->group(function () {
    Route::prefix('visitor')->group(function () {
        Route::get('/','LoginController@showLoginForm')->name('visitor.login');
        Route::post('/','LoginController@login');
        Route::get('register','RegisterController@showRegistrationForm')->name('visitor.register');
        Route::post('register','RegisterController@register');

        //Dashboard routes
        Route::get('dashboard','DashboardController@index')->name('visitor.dashboard');
    });

    Route::prefix('visitor-password')->group(function () {
        Route::post('email','ForgotPasswordController@sendResetLinkEmail')->name('visitor.password.email');
        Route::get('reset','ForgotPasswordController@showLinkRequestForm')->name('visitor.password.update');
        Route::post('reset','ResetPasswordController@reset');
        Route::get('reset/{token}','ResetPasswordController@showResetForm')->name('visitor.password.reset');
    });
});

Route::fallback(function() {
    return 'ne postoji trazena strana';
});
