<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/* Session control routes */
Route::get('/login', array('as' => 'session.create', 'uses' => 'SessionController@create'))->before('guest');
Route::get('/logout', array('as' => 'session.destroy', 'uses' => 'SessionController@destroy'));
Route::resource('session', 'SessionController', array('only' => array('store')));

/* User resource routes */
Route::resource('user', "UserController");
Route::delete('/multiple_destroy', array('as' => 'user.multiple_destroy', 'uses' => 'UserController@multiple_destroy'));
Route::get('/user/report/{user_id}', array('as' => 'user.report', 'uses' => 'UserController@report'));
Route::post('/user/report/{user_id}', array('as' => 'user.report', 'uses' => 'UserController@reportDate'));

/* Timetable routes */
Route::get('/arrival', array('as' => 'timetable.arrival', 'uses' => 'TimetableController@arrival'));
Route::get('/departure', array('as' => 'timetable.departure', 'uses' => 'TimetableController@departure'));

/* Report controller route */
Route::resource("report","ReportController");

Route::get('/', array('as' => 'home.dashboard', 'uses' => 'HomeController@dashboard'))->before('auth');
