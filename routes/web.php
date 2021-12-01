<?php

use App\Models\Payment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

// linktree-clone.com/dashboard
Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {

    Route::get('/links', [App\Http\Controllers\LinkController::class, 'index']);
    Route::get('/links/new', [App\Http\Controllers\LinkController::class, 'create']);
    Route::post('links/new', [App\Http\Controllers\LinkController::class, 'store']);
    Route::get('/links/{account}', [App\Http\Controllers\LinkController::class, 'edit']);
    Route::post('/links/{account}', [App\Http\Controllers\LinkController::class, 'update']);
    Route::delete('links/{account}', [App\Http\Controllers\LinkController::class, 'destroy']);

    Route::get('/settings', [App\Http\Controllers\UserController::class, 'edit']);
    Route::post('/settings', [App\Http\Controllers\UserController::class, 'update']);
});


Route::post('visit/{account}', [App\Http\Controllers\VisitController::class, 'store']);

// linktree-clone.com/username
Route::get('/{user}', [App\Http\Controllers\UserController::class, 'show']);

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
