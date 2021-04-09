<?php

Route::get('/', 'IndexController@index');
Route::view('/preregister', 'docs::preregister');
Route::view('/structure', 'docs::structure');
Route::view('/searching', 'docs::searching');
Route::view('/photo-competition', 'docs::photocomp');
Route::view('/acars', 'docs::acars');
Route::view('/rules', 'docs::rules');
Route::view('/flying-online', 'docs::flying-online');
// Route::get('/charityevent', 'DocController@charityFleet');

/*
 * To register a route that needs to be authentication, wrap it in a
 * Route::group() with the auth middleware
 */
// Route::group(['middleware' => 'auth'], function() {
//     Route::get('/', 'IndexController@index');
// })
