<?php

use App\Http\Controllers\Admin\Index as AdminIndex;
use App\Http\Livewire\Admin\Index;
use App\Http\Livewire\Teste;
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

Acl::routes([
    'middleware' => ['auth', 'acl'], //'password.confirm'
    'prefix' => 'admin/acl',
    'name' => 'admin.acl.'
]);

Auth::routes([
    'register' => false,
    'verify' => true
]);


Route::prefix('/')->name('site.')->group(function () {
    Route::get('/', function () {
        return 'ROTA DO SITE (SE TIVER)';
    });
});

Route::prefix('admin')->name('admin.')->middleware('auth', 'acl')->group(function () {

    Route::get('/', 'Admin\DashboardController@index')->name('index');
    Route::resource('/perfil', 'Admin\ProfileController')->only(['index', 'update', 'store']);
    Route::resource('/usuarios', 'Admin\UsersController');


    Route::get('/galeria', function () {
        return view('admin.gallery.index');
    })->name('galeria');
});

//->middleware(['password.confirm']);
