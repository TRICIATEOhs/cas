<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function () {
    return view('welcome');
});


//the {id} method cannot be above specific methods such as create, index
Route::get('staffs', 'StaffsController@index');
Route::get('staffs/create', 'StaffsController@create');
Route::get('staffs/edit/{id}', 'StaffsController@edit');
Route::post('staffs/update/{id}', 'StaffsController@update');
Route::get('staffs/destroy/{id}', 'StaffsController@destroy');
Route::get('staffs/{id}', 'StaffsController@show');
Route::post('staffs', 'StaffsController@store');
//Route::resource('staffs', 'StaffsController');

//the {id} method cannot be above specific methods such as create, index
Route::get('congregations', 'CongregationsController@index');
Route::get('congregations/create', 'CongregationsController@create');
Route::get('congregations/edit/{id}', 'CongregationsController@edit');
Route::post('congregations/update/{id}', 'CongregationsController@update');
Route::get('congregations/destroy/{id}', 'CongregationsController@destroy');
Route::get('congregations/{id}', 'CongregationsController@show');
Route::post('congregations', 'CongregationsController@store');

//the {id} method cannot be above specific methods such as create, index
Route::get('attendances', 'AttendancesController@index');
Route::get('attendances/create', 'AttendancesController@create');
Route::get('attendances/edit/{id}', 'AttendancesController@edit');
Route::post('attendances/update/{id}', 'AttendancesController@update');
Route::get('attendances/destroy/{id}', 'AttendancesController@destroy');
Route::get('attendancess/{id}', 'AttendancesController@show');
Route::post('attendances', 'AttendancesController@store');

