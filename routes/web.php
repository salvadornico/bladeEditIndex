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

Route::get('/tags/{id}', 'TagController@displayTag');

Route::group(['middleware' => 'auth'], function() {
	Route::get('/addVideo', 'VideoController@addVideo');
	Route::post('/addVideo', 'VideoController@saveVideo');
	Route::get('/editVideo', 'VideoController@editVideo');
	Route::post('/editVideo', 'VideoController@saveVideoEdit');
	Route::post('/deleteVideo', 'VideoController@deleteVideo');
	
	Route::post('/videos/{id}/addTag', 'TagController@addTag');

	Route::get('/dashboard', 'VideoController@showDashboard');
});

Route::group(['middleware' => 'App\Http\Middleware\ModMiddleware'], function() {
	Route::post('/deleteTag', 'TagController@deleteTag');
}); 

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function() {
	Route::get('/test', 'VideoController@test');	
	Route::get('/admin', 'VideoController@showAdminPanel');	
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
