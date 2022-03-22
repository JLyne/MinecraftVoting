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

Route::get('/complete', 'VoteController@complete')->name('complete');

Route::middleware(['web', 'votetoken'])->group(function () {
    Route::post('/{group:slug}', 'VoteController@submit')->name('submit');
    Route::get('/{group:slug}', 'VoteController@form')->name('submit');
});

