<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Papel; // declara o model

class PapelController extends Controller
{
	public function index()
	{
		$registros = Papel::all();
    	return view('admin.papel.index', compact('registros'));
	}

	// carrega a página de inserção
    public function adicionar()
    {
        return view('admin.papel.adicionar-papel');
    }

    // salva os dados quando o formulário for submetido
    public function salvar(Request $req)
    {
        Papel::create($req->all());

        \Session::flash('mensagem', ['msg' => 'Registro salvo com sucesso.', 
            'class'=>'teal lighten-2 white-text']);

        return redirect()->route('admin.papel');
    }

    // carrega a página de edição
    public function editar($id)
    {
    	// não permite alterar o 'admin'
        if (Papel::find($id)->nome == "admin") {
        	return redirect()->route('admin.papel');
        }

        $registro = Papel::find($id);

        return view('admin.papel.editar-papel', compact('registro'));
    }

    // atualiza os dados quando o formulário for submetido
    public function atualizar(Request $req, $id)
    {
    	// não permite alterar o 'admin'
    	if (Papel::find($id)->nome == "admin") {
        	return redirect()->route('admin.papel');
        }

        Papel::find($id)->update($req->all());

        \Session::flash('mensagem', ['msg' => 'Registro atualizado com sucesso.', 
            'class'=>'teal lighten-2 white-text']);

        return redirect()->route('admin.papel');
    }

    // exclui registro
    public function excluir($id)
    {
    	// não permite excluir o 'admin'
    	if (Papel::find($id)->nome == "admin") {
        	return redirect()->route('admin.papel');
        }

        Papel::find($id)->delete();

        \Session::flash('mensagem', ['msg' => 'Registro excluído com sucesso.', 
            'class'=>'teal lighten-2 white-text']);

        return redirect()->route('admin.papel');
    }
}
