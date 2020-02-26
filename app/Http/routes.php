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

// rota para página
Route::get('/', ['as' => 'site.home', function(){
	return view('site.home');
}]);

// no lugar dessa rota para a página...
/*Route::get('/sobre', ['as' => 'site.sobre', function(){
	return view('site.sobre');
}]);*/

// ... usar rota para o controller
Route::get('/sobre', ['as'=>'site.sobre', 'uses'=>'Site\PaginaController@sobre']);

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

// aqui é 'post' porque envia dados de formulário
Route::post('/admin/login', ['as' => 'admin.login', 'uses' => 'Admin\UsuarioController@login']);

//Route::get('/home', 'HomeController@index');

// --------------------------------------------------------------
// 		** protegendo o acesso não autenticado
// 		** todos os acessos dentro desse Route::group()
// --------------------------------------------------------------
// esse 'auth' vem de Kernel.php -> $routeMiddleware
Route::group(['middleware'=>'auth'], function() {

	// aqui é 'get' --> não envia nada
	Route::get('/admin/sair', ['as' => 'admin.sair', 'uses' => 'Admin\UsuarioController@sair']);

	// alteração em /app/Http/Middleware/Authenticate.php
	Route::get('/admin', ['as' => 'admin.home', function() {
		return view('admin.home.index');
	}]);

	// [ LISTAR ]
	Route::get('/admin/usuarios', ['as' => 'admin.usuarios', 'uses' => 'Admin\UsuarioController@index']);

	// [ INSERIR ] carrega a página de inserção
	Route::get('/admin/usuarios/add', ['as' => 'admin.usuarios.add', 'uses' => 'Admin\UsuarioController@adicionar']);

	// [ INSERIR ] salva os dados quando o formulário for submetido
	Route::post('/admin/usuarios/salvar', ['as' => 'admin.usuarios.salvar', 'uses' => 'Admin\UsuarioController@salvar']);

	// [ EDITAR ] carrega a página de edição
	Route::get('/admin/usuarios/editar/{id}', ['as' => 'admin.usuarios.editar', 'uses' => 'Admin\UsuarioController@editar']);

	// [ EDITAR ] salva os dados quando o formulário for submetido
	Route::put('/admin/usuarios/atualizar/{id}', ['as' => 'admin.usuarios.atualizar', 'uses' => 'Admin\UsuarioController@atualizar']);

	// [ EXCLUIR ] exclui usuário
	Route::get('/admin/usuarios/excluir/{id}', ['as' => 'admin.usuarios.excluir', 'uses' => 'Admin\UsuarioController@excluir']);
});
// --------------------------------------------------------------
// 		** FIM do bloco de acesso protegido
// --------------------------------------------------------------

