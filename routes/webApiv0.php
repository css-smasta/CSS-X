<?php
/*
|--------------------------------------------------------------------------
| Web API V0 Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/theme:{themeMode}', 'SetTheme@theme');
Route::middleware(['isPengurus'])->group(function () {
    Route::post('/latihan/simpan', 'Latihan@simpan')->name('apiv0.latihan.simpan');
    Route::put('/submisi/periksa/{id}', 'Submisi@periksa');
});
