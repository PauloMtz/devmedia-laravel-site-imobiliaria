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

Route::get('/', ['as'=>'site.home', 'uses'=>'Site\HomeController@index']);

// no lugar dessa rota para a página...
/*Route::get('/sobre', ['as' => 'site.sobre', function(){
	return view('site.sobre');
}]);*/

// ... usar rota para o controller
Route::get('/sobre', ['as'=>'site.sobre', 'uses'=>'Site\PaginaController@sobre']);

Route::get('/contato', ['as'=>'site.contato', 'uses'=>'Site\PaginaController@contato']);

Route::post('/contato/enviar', ['as'=>'site.contato.enviar', 'uses'=>'Site\PaginaController@contatoEnviar']);

/*Route::get('/contato', ['as' => 'site.contato', function(){
	return view('site.contato');
}]);*/

// página de detalhes do imóvel [ o 'id' é obrigatório, o título é opcional (?) ]
/*Route::get('/imovel/{id}/{titulo?}', ['as' => 'site.imovel', function(){
	return view('site.imovel');
}]);*/

Route::get('/imovel/{id}/{titulo?}', ['as' => 'site.imovel', 'uses'=>'Site\ImovelController@index']);

Route::get('/busca', ['as' => 'site.busca', 'uses'=>'Site\HomeController@busca']);

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

	// -------------------- x -------------------- x -------------------- x -------------------- x --------------------

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

	// -------------------- x -------------------- x -------------------- x -------------------- x --------------------

	// [ PÁGINAS LISTAR ]
	Route::get('/admin/paginas', ['as' => 'admin.paginas', 'uses' => 'Admin\PaginaController@index']);

	// [ PÁGINAS EDITAR ] carrega a página para edição
	Route::get('/admin/paginas/editar/{id}', ['as' => 'admin.paginas.editar', 'uses' => 'Admin\PaginaController@editar']);

	// [ PÁGINAS ATUALIZAR ] atualiza os dados quando o formulário for submetido
	Route::put('/admin/paginas/atualizar/{id}', ['as' => 'admin.paginas.atualizar', 'uses' => 'Admin\PaginaController@atualizar']);

	// -------------------- x -------------------- x -------------------- x -------------------- x --------------------
	// foi copiado usuarios e substituído por tipos

	// [ LISTAR ]
	Route::get('/admin/tipos', ['as' => 'admin.tipos', 'uses' => 'Admin\TipoController@index']);

	// [ INSERIR ] carrega a página de inserção
	Route::get('/admin/tipos/add', ['as' => 'admin.tipos.add', 'uses' => 'Admin\TipoController@adicionar']);

	// [ INSERIR ] salva os dados quando o formulário for submetido
	Route::post('/admin/tipos/salvar', ['as' => 'admin.tipos.salvar', 'uses' => 'Admin\TipoController@salvar']);

	// [ EDITAR ] carrega a página de edição
	Route::get('/admin/tipos/editar/{id}', ['as' => 'admin.tipos.editar', 'uses' => 'Admin\TipoController@editar']);

	// [ EDITAR ] salva os dados quando o formulário for submetido
	Route::put('/admin/tipos/atualizar/{id}', ['as' => 'admin.tipos.atualizar', 'uses' => 'Admin\TipoController@atualizar']);

	// [ EXCLUIR ] exclui usuário
	Route::get('/admin/tipos/excluir/{id}', ['as' => 'admin.tipos.excluir', 'uses' => 'Admin\TipoController@excluir']);

	// -------------------- x -------------------- x -------------------- x -------------------- x --------------------

	// foi copiado tipos e substituído por cidades

	// [ LISTAR ]
	Route::get('/admin/cidades', ['as' => 'admin.cidades', 'uses' => 'Admin\CidadeController@index']);

	// [ INSERIR ] carrega a página de inserção
	Route::get('/admin/cidades/add', ['as' => 'admin.cidades.add', 'uses' => 'Admin\CidadeController@adicionar']);

	// [ INSERIR ] salva os dados quando o formulário for submetido
	Route::post('/admin/cidades/salvar', ['as' => 'admin.cidades.salvar', 'uses' => 'Admin\CidadeController@salvar']);

	// [ EDITAR ] carrega a página de edição
	Route::get('/admin/cidades/editar/{id}', ['as' => 'admin.cidades.editar', 'uses' => 'Admin\CidadeController@editar']);

	// [ EDITAR ] salva os dados quando o formulário for submetido
	Route::put('/admin/cidades/atualizar/{id}', ['as' => 'admin.cidades.atualizar', 'uses' => 'Admin\CidadeController@atualizar']);

	// [ EXCLUIR ] exclui usuário
	Route::get('/admin/cidades/excluir/{id}', ['as' => 'admin.cidades.excluir', 'uses' => 'Admin\CidadeController@excluir']);

	// -------------------- x -------------------- x -------------------- x -------------------- x --------------------

	// foi copiado cidades e substituído por imoveis

	// [ LISTAR ]
	Route::get('/admin/imoveis', ['as' => 'admin.imoveis', 'uses' => 'Admin\ImovelController@index']);

	// [ INSERIR ] carrega a página de inserção
	Route::get('/admin/imoveis/add', ['as' => 'admin.imoveis.add', 'uses' => 'Admin\ImovelController@adicionar']);

	// [ INSERIR ] salva os dados quando o formulário for submetido
	Route::post('/admin/imoveis/salvar', ['as' => 'admin.imoveis.salvar', 'uses' => 'Admin\ImovelController@salvar']);

	// [ EDITAR ] carrega a página de edição
	Route::get('/admin/imoveis/editar/{id}', ['as' => 'admin.imoveis.editar', 'uses' => 'Admin\ImovelController@editar']);

	// [ EDITAR ] salva os dados quando o formulário for submetido
	Route::put('/admin/imoveis/atualizar/{id}', ['as' => 'admin.imoveis.atualizar', 'uses' => 'Admin\ImovelController@atualizar']);

	// [ EXCLUIR ] exclui usuário
	Route::get('/admin/imoveis/excluir/{id}', ['as' => 'admin.imoveis.excluir', 'uses' => 'Admin\ImovelController@excluir']);

	// -------------------- x -------------------- x -------------------- x -------------------- x --------------------

	// foi copiado imoveis e substituído por galerias

	// [ LISTAR ] ** esse 'id' é do imóvel **
	Route::get('/admin/galerias/{id}', ['as' => 'admin.galerias', 'uses' => 'Admin\GaleriaController@index']);

	// [ INSERIR ] carrega a página de inserção
	Route::get('/admin/galerias/add/{id}', ['as' => 'admin.galerias.add', 'uses' => 'Admin\GaleriaController@adicionar']);

	// [ INSERIR ] salva os dados quando o formulário for submetido
	Route::post('/admin/galerias/salvar/{id}', ['as' => 'admin.galerias.salvar', 'uses' => 'Admin\GaleriaController@salvar']);

	// [ EDITAR ] carrega a página de edição
	Route::get('/admin/galerias/editar/{id}', ['as' => 'admin.galerias.editar', 'uses' => 'Admin\GaleriaController@editar']);

	// [ EDITAR ] salva os dados quando o formulário for submetido
	Route::put('/admin/galerias/atualizar/{id}', ['as' => 'admin.galerias.atualizar', 'uses' => 'Admin\GaleriaController@atualizar']);

	// [ EXCLUIR ] exclui usuário
	Route::get('/admin/galerias/excluir/{id}', ['as' => 'admin.galerias.excluir', 'uses' => 'Admin\GaleriaController@excluir']);

	// -------------------- x -------------------- x -------------------- x -------------------- x --------------------

	// foi copiado galerais e substituído por slides

	// [ LISTAR ] 
	Route::get('/admin/slides', ['as' => 'admin.slides', 'uses' => 'Admin\SlideController@index']);

	// [ INSERIR ] carrega a página de inserção
	Route::get('/admin/slides/add', ['as' => 'admin.slides.add', 'uses' => 'Admin\SlideController@adicionar']);

	// [ INSERIR ] salva os dados quando o formulário for submetido
	Route::post('/admin/slides/salvar', ['as' => 'admin.slides.salvar', 'uses' => 'Admin\SlideController@salvar']);

	// [ EDITAR ] carrega a página de edição
	Route::get('/admin/slides/editar/{id}', ['as' => 'admin.slides.editar', 'uses' => 'Admin\SlideController@editar']);

	// [ EDITAR ] salva os dados quando o formulário for submetido
	Route::put('/admin/slides/atualizar/{id}', ['as' => 'admin.slides.atualizar', 'uses' => 'Admin\SlideController@atualizar']);

	// [ EXCLUIR ] exclui usuário
	Route::get('/admin/slides/excluir/{id}', ['as' => 'admin.slides.excluir', 'uses' => 'Admin\SlideController@excluir']);

	// -------------------- x -------------------- x -------------------- x -------------------- x --------------------

	// foi copiado slides e substituído por papeis

	// [ LISTAR ] 
	Route::get('/admin/papel', ['as' => 'admin.papel', 'uses' => 'Admin\PapelController@index']);

	// [ INSERIR ] carrega a página de inserção
	Route::get('/admin/papel/add', ['as' => 'admin.papel.add', 'uses' => 'Admin\PapelController@adicionar']);

	// [ INSERIR ] salva os dados quando o formulário for submetido
	Route::post('/admin/papel/salvar', ['as' => 'admin.papel.salvar', 'uses' => 'Admin\PapelController@salvar']);

	// [ EDITAR ] carrega a página de edição
	Route::get('/admin/papel/editar/{id}', ['as' => 'admin.papel.editar', 'uses' => 'Admin\PapelController@editar']);

	// [ EDITAR ] salva os dados quando o formulário for submetido
	Route::put('/admin/papel/atualizar/{id}', ['as' => 'admin.papel.atualizar', 'uses' => 'Admin\PapelController@atualizar']);

	// [ EXCLUIR ] exclui registro
	Route::get('/admin/papel/excluir/{id}', ['as' => 'admin.papel.excluir', 'uses' => 'Admin\PapelController@excluir']);

	// -------------------- x -------------------- x -------------------- x -------------------- x --------------------

	// permissões

	// [ LISTAR ] permissões
	Route::get('/admin/papel/permissao/{id}', ['as' => 'admin.papel.permissao', 'uses' => 'Admin\PapelController@permissao']);

	// [ INSERIR ]
	Route::post('/admin/papel/permissao/{id}/salvar', ['as' => 'admin.papel.permissao.salvar', 'uses' => 'Admin\PapelController@salvarPermissao']);

	// [ EXCLUIR ]
	Route::get('/admin/papel/permissao/{id}/remover/{id_permissao}', ['as' => 'admin.papel.permissao.remover', 'uses' => 'Admin\PapelController@removerPermissao']);

	// -------------------- x -------------------- x -------------------- x -------------------- x --------------------

	// relação papel-usuário

	Route::get('/admin/usuarios/papel/{id}', ['as' => 'admin.usuarios.papel', 'uses' => 'Admin\UsuarioController@papel']);

	Route::post('/admin/usuarios/papel/salvar/{id}', ['as' => 'admin.usuarios.papel.salvar', 'uses' => 'Admin\UsuarioController@salvarPapel']);

	Route::get('/admin/usuarios/papel/excluir/{id}/{papel_id}', ['as' => 'admin.usuarios.papel.excluir', 'uses' => 'Admin\UsuarioController@excluirPapel']);

	// -------------------- x -------------------- x -------------------- x -------------------- x --------------------

	// relação papel-permissão

	Route::get('/admin/papel/permissao/{id}', ['as' => 'admin.papel.permissao', 'uses' => 'Admin\PapelController@permissao']);

	Route::post('/admin/papel/permissao/salvar/{id}', ['as' => 'admin.papel.permissao.salvar', 'uses' => 'Admin\PapelController@salvarPermissao']);

	Route::get('/admin/papel/permissao/excluir/{id}/{id_permissao}', ['as' => 'admin.papel.permissao.excluir', 'uses' => 'Admin\PapelController@excluirPermissao']);

	// -------------------- x -------------------- x -------------------- x -------------------- x --------------------

});
// --------------------------------------------------------------
// 		** FIM do bloco de acesso protegido
// --------------------------------------------------------------
