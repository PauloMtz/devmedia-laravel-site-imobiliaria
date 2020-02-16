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

// página de detalhes do imóvel [ o 'id' é obrigatório, o título é opcional (?) ]
Route::get('/imovel/{id}/{titulo?}', ['as' => 'site.imovel', function(){
	return view('site.imovel');
}]);

Route::auth();

Route::get('/home', 'HomeController@index');
