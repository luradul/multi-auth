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

// Regular-user routes
Auth::routes();

Route::group(['regular-user-routes', 'middleware' => 'auth'], function () {
    Route::get('home', 'HomeController@index')->name('home');
    //ova ruta ne dozvoljava slanje poruka odredjenim korisnicima, zahvaljujuci gate-u: can-send-emails
    Route::post('home', 'HomeController@mail')->middleware('can:can-send-emails');
});



// Admin routes
Route::group(['admin-routes', 'namespace' => 'Admin'], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/','LoginController@showLoginForm')->name('admin.login');
        Route::post('/','LoginController@login');
//        Route::post('logout','LoginController@logout')->name('admin.logout');
        Route::get('register','RegisterController@showRegistrationForm')->name('admin.register');
        Route::post('register','RegisterController@register');

        //Dashboard routes
        Route::middleware(['user_id', 'auth:admin'])->group(function () {
            Route::get('dashboard','DashboardController@index')->name('admin.dashboard');
            Route::post('dashboard','DashboardController@store');
        });
    });

    Route::prefix('admin-password')->group(function () {
        Route::post('email','ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
        Route::get('reset','ForgotPasswordController@showLinkRequestForm')->name('admin.password.update');
        Route::post('reset','ResetPasswordController@reset');
        Route::get('reset/{token}','ResetPasswordController@showResetForm')->name('admin.password.reset');
    });
});

//Visitor routes
Route::group(['visitor-routes', 'namespace' => 'Visitor'], function () {
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
