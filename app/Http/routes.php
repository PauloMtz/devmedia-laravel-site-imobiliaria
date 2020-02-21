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

// --------------------------------------------------------------
// 				** CARREGA PÁGINAS **
// --------------------------------------------------------------

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

// essa autenticação automática não será utilizada
//Route::auth();

Route::get('/admin/login', ['as' => 'admin.login', function() {
	return view('admin.login.index');
}]);

// --------------------------------------------------------------
// 				** ACESSA OS CONTROLLERS **
// --------------------------------------------------------------

// ** ATENTAR PARA 'GET' & 'POST' **

// aqui é 'post' porque envia dados de formulário
Route::post('/admin/login', ['as' => 'admin.login', 'uses' => 'Admin\UsuarioController@login']);

//Route::get('/home', 'HomeController@index');

// protegendo o acesso não autenticado
// esse 'auth' vem de Kernel.php -> $routeMiddleware
Route::group(['middleware'=>'auth'], function() {

	// aqui é 'get' --> não envia nada
	Route::get('/admin/sair', ['as' => 'admin.sair', 'uses' => 'Admin\UsuarioController@sair']);

	// alteração em /app/Http/Middleware/Authenticate.php
	Route::get('/admin', ['as' => 'admin.home', function() {
		return view('admin.home.index');
	}]);
});

