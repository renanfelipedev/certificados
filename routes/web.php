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

Route::get('/certificado/validar', 'User\Certificate\ValidateCertificateController@showForm')->name('validar.certificado');
Route::post('/certificado/verificar', 'User\Certificate\ValidateCertificateController@verify')->name('verificar.certificado');

Route::middleware(['checkActive', 'auth'])->group(function () {
    Route::redirect('/', '/dashboard', 301);
    Route::redirect('/home', '/dashboard', 301);

    Route::get('/dashboard', function () {
        if (Auth::user()->admin) {
            return redirect('/admin');
        }

        return redirect('/painel');
    });


    Route::namespace('Admin')->group(function () {
        Route::get('/admin', 'HomeController@index')->name('admin.dashboard');
        Route::resource('/users', 'UserController');
        Route::post('/admin/users/active/{id}', 'ToggleUserActivationController')->name('users.toggleActive');
    });

    Route::namespace('User')->group(function () {
        Route::get('/painel', 'HomeController@index')->name('user.dashboard');

        Route::resource('/activities', 'ActivityController')->except('show');

        Route::resource('/atividades/{id}/teams', 'TeamWithActivityController');
        Route::resource('/turmas', 'TeamController');
        Route::resource('/turmas/{id}/alunos', 'StudentController');

        Route::post('/turmas/{id}/alunos/importar', 'ImportStudentController')->name('alunos.import');
        Route::get('/turmas/{team}/certificado/modelo', 'Certificate\GenerateCertificateController')->name('mostrar.certificado');
        Route::post('/turmas/{team}/certificado/alterar', 'Certificate\UploadCertificateController')->name('alterar.certificado');

        Route::get('/alunos/{student}/certificado', 'Certificate\GenerateCertificateController')->name('alunos.certificado');
    });
});
