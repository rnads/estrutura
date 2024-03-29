<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use TJGazel\LaravelDocBlockAcl\Facades\Acl;

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

Acl::routes([
    'middleware' => ['auth', 'acl'], //'password.confirm'
    'prefix' => 'admin/acl',
    'name' => 'admin.acl.'
]);

Auth::routes([
    'register' => false,
    'verify' => false
]);


Route::prefix('/')->name('site.')->group(function () {
    Route::get('/', function () {
        return 'ROTA DO SITE (SE TIVER)';
    });
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'acl'])->group(function () {

    Route::get('/', 'Admin\DashboardController@index')->name('index');
    Route::resource('/perfil', 'Admin\ProfileController')->only(['index', 'update', 'store']);
    Route::resource('/usuarios', 'Admin\UsersController');


    Route::get('/galeria', function () {
        return view('admin.gallery.index');
    })->name('galeria');
});
