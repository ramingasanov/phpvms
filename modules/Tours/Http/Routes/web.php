<?php

//Route::get('/', 'IndexController@index');
Route::get('/', 'TourController@getTours');

/*
 * To register a route that needs to be authentication, wrap it in a
 * Route::group() with the auth middleware
 */
// Route::group(['middleware' => 'auth'], function() {
//     Route::get('/', 'IndexController@index');
// })
