<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@home');
Route::get('/channel/{channel}', 'HomeController@channelView');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('channels', 'ChannelController');
Route::get('channels/{channel}/videos', 'VideoController@index');
Route::get('channels/{channel}/videos', 'VideoController@create');
Route::post('channels/{channel}/videos', 'VideoController@store');
Route::resource('videos', 'VideoController');