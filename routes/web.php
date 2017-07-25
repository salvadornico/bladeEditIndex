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

Route::get('/', 'VideoController@displayHome');
Route::get('/videos', 'VideoController@displayAllVideos');
Route::get('/videos/{id}', 'VideoController@displayOneVideo');

Route::group(['middleware' => 'auth'], function() {
	Route::get('/videos/{id}/addTag', 'TagController@addTag');	
});

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function() {
	Route::get('/test', 'VideoController@test');	
}); 

Auth::routes();
