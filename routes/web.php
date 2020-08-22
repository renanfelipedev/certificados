<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::middleware(['checkActive', 'auth'])->group(function () {



    Route::redirect('/', '/dashboard', 301);

    Route::get('/dashboard', function () {
        if (Auth::user()->admin) {
            return redirect('/admin');
        }

        return redirect('/painel');
    });


    Route::namespace('Admin')->group(function () {
        Route::get('/admin', 'HomeController@index')->name('admin.dashboard');
        Route::resource('/users', 'UserController');
        Route::post('/admin/users/active/{id}', 'ToggleUserActivationController@update')->name('users.toggleActive');
    });

    Route::namespace('User')->group(function () {
        Route::get('/painel', 'HomeController@index')->name('user.dashboard');
    });

});
