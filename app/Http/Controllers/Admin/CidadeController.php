<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cidade; // chamada do model, fica dentro de /app

class CidadeController extends Controller
{
    // lista as cidades
    public function index()
    {
        // lista todas as cidades
        $registros = Cidade::all();

        //dd($tipos); // é o mesmo que var_dump($registros)
        // esse compact('registros') abaixo é um array de $registros
        return view('admin.cidades.index', compact('registros'));
    }

    // carrega a página de inserção
    public function adicionar()
    {
        return view('admin.cidades.adicionar-cidade');
    }

    // salva os dados no bando quando o formulário for submetido
    public function salvar(Request $req)
    {
        $dados = $req->all();

        $c = new Cidade();
        $c->nome = $dados['nome'];
        $c->estado = $dados['estado'];
        $c->uf = $dados['uf'];
        $c->save();

        \Session::flash('mensagem', ['msg' => 'Registro salvo com sucesso.', 'class'=>'teal lighten-2 white-text']);

        return redirect()->route('admin.cidades');
    }

    // carrega a página de edição
    public function editar($id)
    {
        // procura o 'id' no banco
        $registro = Cidade::find($id);

        // envia os dados referente à variável '$registro' para a view
        return view('admin.cidades.editar-cidade', compact('registro'));
    }

    // atualiza os dados quando o formulário for submetido
    public function atualizar(Request $req, $id)
    {
        // procura o id no banco de dados
        $registro = Cidade::find($id);

        // joga os dados numa variável
        $dados = $req->all();

        $registro->nome = $dados['nome'];
        $registro->estado = $dados['estado'];
        $registro->uf = $dados['uf'];

        // atualiza os dados
        $registro->update(); // pode ser update ou save

        // depois de tudo isso, redireciona usuário com mensagem de êxito
        \Session::flash('mensagem', ['msg' => 'Registro atualizado com sucesso.', 'class'=>'teal lighten-2 white-text']);

        return redirect()->route('admin.cidades');
    }

    // exclui registro
    public function excluir($id)
    {
        // procura o id no banco e exclui
        Cidade::find($id)->delete();

        // depois, redireciona usuário com mensagem de êxito
        \Session::flash('mensagem', ['msg' => 'Registro excluído com êxito.', 'class'=>'teal lighten-2 white-text']);

        return redirect()->route('admin.cidades');
    }
}
