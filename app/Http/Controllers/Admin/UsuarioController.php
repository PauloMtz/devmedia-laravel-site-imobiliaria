<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth; // usar o sistema de autenticação do Laravel
use App\User;
use App\Papel; // chama o model

class UsuarioController extends Controller
{
    public function login(Request $req)
    {
    	$dados = $req->all();
    	//dd($dados); // esse dd() equivale ao var_dump()

    	if (Auth::attempt(['email'=>$dados['email'], 'password'=>$dados['password']])) {
    		\Session::flash('mensagem', ['msg' => 'Login realizado com sucesso.', 'class'=>'teal lighten-2 white-text']);
    		return redirect()->route('admin.home');
    	}
    	\Session::flash('mensagem', ['msg' => 'Dados incorretos. Verifique seus dados e tente novamente.', 'class'=>'red lighten-2 white-text']);
    	return redirect()->route('admin.login');
    }

    public function sair()
    {
    	Auth::logout();
    	return redirect()->route('admin.login');
    }

    // lista os usuários
    public function index()
    {
        /*if (auth()->user()->can('listar-usuarios', true)) {
            dd('sim');
        } else {
            dd('não');
        }*/

    	// lista todos os usuários
    	$usuario = User::all();

    	//dd($usuario); // é o mesmo que var_dump($usuario)
    	// esse compact('usuario') abaixo é um array de $usuario
    	return view('admin.usuarios.index', compact('usuario'));
    }

    // carrega a página de inserção
    public function adicionar()
    {
    	return view('admin.usuarios.adicionar-usuario');
    }

    // salva os dados no bando quando o formulário for submetido
    public function salvar(Request $req)
    {
    	$dados = $req->all();

    	$u = new User();
    	$u->name = $dados['name'];
    	$u->email = $dados['email'];
    	$u->password = bcrypt($dados['password']);
    	$u->save();

    	\Session::flash('mensagem', ['msg' => 'Registro salvo com sucesso.', 'class'=>'teal lighten-2 white-text']);

    	return redirect()->route('admin.usuarios');
    }

    // carrega a página de edição
    public function editar($id)
    {
    	// procura o 'id' no banco
    	$u = User::find($id);

    	// envia os dados referente à variável '$u' para a view
    	return view('admin.usuarios.editar-usuario', compact('u'));
    }

    // atualiza os dados quando o formulário for submetido
    public function atualizar(Request $req, $id)
    {
    	// procura o id no banco de dados
    	$us = User::find($id);

    	// joga os dados numa variável
    	$dados = $req->all();

    	// verifica se tem uma senha com mais de 2 dígitos
    	if (isset($dados['password']) && strlen($dados['password']) > 2) {
    		// se tiver -> criptografa
    		$dados['password'] = bcrypt($dados['password']);
    	} else {
    		// se não tiver -> mantém anterior
    		unset($dados['password']);
    	}

    	// atualiza os dados
    	$us->update($dados);

    	// depois de tudo isso, redireciona usuário com mensagem de êxito
    	\Session::flash('mensagem', ['msg' => 'Registro atualizado com sucesso.', 'class'=>'teal lighten-2 white-text']);

    	return redirect()->route('admin.usuarios');
    }

    // exclui registro
    public function excluir($id)
    {
    	// procura o id no banco e exclui
    	$u = User::find($id)->delete();

    	// depois, redireciona usuário com mensagem de êxito
    	\Session::flash('mensagem', ['msg' => 'Registro excluído com êxito.', 'class'=>'teal lighten-2 white-text']);

    	return redirect()->route('admin.usuarios');
    }

    // -------------------- x -------------------- x -------------------- x -------------------- x --------------------
    //         ***********    RELACIONANDO PAPEL-USUÁRIO *****************
    // -------------------- x -------------------- x -------------------- x -------------------- x --------------------

    // os nomes dos métodos aqui devem ser conforme estabelecidos nas rotas

    public function papel($id)
    {
        $usuario = User::find($id);
        $papel = Papel::all();

        return view('admin.usuarios.papel', compact('usuario', 'papel'));
    }

    public function salvarPapel(Request $req, $id)
    {
        $usuario = User::find($id);
        $dados = $req->all();
        $papel = Papel::find($dados['papel_id']);
        // adicionaPapel() está no model User [APP\User]
        $usuario->adicionaPapel($papel);

        return redirect()->back(); // retorna para última página
    }

    public function excluirPapel($id, $papel_id)
    {
        $usuario = User::find($id);
        $papel = Papel::find($papel_id);

        // removerPapel() está no model User [APP\User]
        $usuario->removerPapel($papel);

        return redirect()->back(); // retorna para última página
    }
}
