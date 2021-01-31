<?php

Route::get('/', 'IndexController@index');
Route::view('/preregister', 'docs::preregister');
Route::view('/structure', 'docs::structure');
Route::view('/searching', 'docs::searching');
Route::view('/photo-competition', 'docs::photocomp');
/*
 * To register a route that needs to be authentication, wrap it in a
 * Route::group() with the auth middleware
 */
// Route::group(['middleware' => 'auth'], function() {
//     Route::get('/', 'IndexController@index');
// })
