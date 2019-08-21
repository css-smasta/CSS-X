<?php
Route::get('/dashboard', 'Dashboard@index');
Route::prefix('latihan')->group(function () {
    Route::get('/buat','Latihan@create');
    Route::get('/review', 'Latihan@list');
    Route::get('/review/{id}', 'Latihan@review');
});
