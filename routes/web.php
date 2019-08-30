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
    return view('index_welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::middleware(['auth', 'checkVerified'])->group(function(){

    Route::prefix('home')->group(function () {
            Route::get('latihan/{id}' ,'LatihanController@lihat_latihan' );
            Route::post('latihan/{id}', 'LatihanController@upload_latihan');
            // Route submisi
        Route::get('/submisi/{id}', 'LatihanController@lihat_submisi');
        Route::get('/submisi/{id}/revisi', 'LatihanController@form_revisi_submisi');
        Route::put('/submisi/{id}/revisi', 'LatihanController@revisi_submisi');
    });
});
