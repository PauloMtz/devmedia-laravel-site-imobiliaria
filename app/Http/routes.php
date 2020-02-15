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

/*Route::get('/', function () {
    return view('site.home');
});*/

Route::get('/', ['as' => 'site.home', function(){
	return view('site.home');
}]);

Route::get('/sobre', ['as' => 'site.sobre', function(){
	return view('site.sobre');
}]);

Route::get('/contato', ['as' => 'site.contato', function(){
	return view('site.contato');
}]);

Route::auth();

Route::get('/home', 'HomeController@index');
