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
Route::post('/search', 'VideoController@search');

Route::get('/videos', 'VideoController@displayAllVideos');
Route::get('/videos/{id}', 'VideoController@displayOneVideo');

Route::get('/tags/{id}', 'TagController@displayTag');

Route::group(['middleware' => 'auth'], function() {
	Route::get('/dashboard', 'VideoController@showDashboard');

	Route::get('/addVideo', 'VideoController@addVideo');
	Route::post('/addVideo', 'VideoController@saveVideo');
	Route::get('/videos/{id}/edit', 'VideoController@editVideo');
	Route::post('/videos/{id}/edit', 'VideoController@saveVideoEdit');
	Route::post('/deleteVideo', 'VideoController@deleteVideo');
	
	Route::post('/videos/{id}/addTag', 'TagController@addTag');

	Route::post('/addFlag', 'FlagController@addFlag');
});

Route::group(['middleware' => 'App\Http\Middleware\ModMiddleware'], function() {
	Route::post('/deleteTag', 'TagController@deleteTag');

	Route::post('/markFlagRead', 'FlagController@markFlagRead');
	Route::post('/markFlagDismissed', 'FlagController@markFlagDismissed');
}); 

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function() {
	Route::get('/test', 'HomeController@test');	
	Route::get('/admin', 'HomeController@showAdminPanel');	
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
