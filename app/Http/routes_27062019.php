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


/* ================== Homepage ================== */
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::post('/doLogin', 'HomeController@doLogin');
Route::auth();

Route::get('/', function () {
   return view('pages.index');
});

/*
Route::get('master-class', function () {
    return view('pages.master-class');
});
Route::get('about', function () {
    return view('pages.about');
});
Route::get('registration', function () {
    return view('pages.registration');
});
Route::get('course-materials', function () {
    return view('pages.course-materials');
});
Route::get('community-of-practice', function () {
    return view('pages.community-of-practice');
});
*/

/* ================== Homepage + Admin Routes ================== */

require __DIR__.'/admin_routes.php';

Route::get('course-materials', [
	'uses' => 'PageController@courseMaterial',
	'as' => 'page.course'
]);

Route::get('registration', [
	'uses' => 'PageController@courseRegistration',
	'as' => 'page.registration'
]);

Route::get('master-class', [
	'uses' => 'PageController@masterClasses',
	'as' => 'page.master-class'
]);
Route::get('community-of-practice', [
	'uses' => 'PageController@communityofPractice',
	'as' => 'page.community-of-practice'
]);

Route::get('{url}', [
	'uses' => 'PageController@getPage',
	'as' => 'page.about'
]);
