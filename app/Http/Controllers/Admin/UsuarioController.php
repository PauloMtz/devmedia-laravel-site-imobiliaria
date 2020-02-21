<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth; // usar o sistema de autenticação do Laravel

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
}
