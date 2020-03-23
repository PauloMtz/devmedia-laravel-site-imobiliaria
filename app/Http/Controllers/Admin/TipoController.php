<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tipo; // chamada do model, fica dentro de /app
use App\Imovel;

class TipoController extends Controller
{
    // lista os tipos
    public function index()
    {
        // lista todos os tipos
        $registros = Tipo::all();

        //dd($tipos); // é o mesmo que var_dump($usuario)
        // esse compact('usuario') abaixo é um array de $usuario
        return view('admin.tipos.index', compact('registros'));
    }

    // carrega a página de inserção
    public function adicionar()
    {
        return view('admin.tipos.adicionar-tipo');
    }

    // salva os dados no bando quando o formulário for submetido
    public function salvar(Request $req)
    {
        $dados = $req->all();

        $t = new Tipo();
        $t->titulo = $dados['titulo'];
        $t->save();

        \Session::flash('mensagem', ['msg' => 'Registro salvo com sucesso.', 'class'=>'teal lighten-2 white-text']);

        return redirect()->route('admin.tipos');
    }

    // carrega a página de edição
    public function editar($id)
    {
        // procura o 'id' no banco
        $registro = Tipo::find($id);

        // envia os dados referente à variável '$registro' para a view
        return view('admin.tipos.editar-tipo', compact('registro'));
    }

    // atualiza os dados quando o formulário for submetido
    public function atualizar(Request $req, $id)
    {
        // procura o id no banco de dados
        $registro = Tipo::find($id);

        // joga os dados numa variável
        $dados = $req->all();

        $registro->titulo = $dados['titulo'];

        // atualiza os dados
        $registro->update(); // pode ser update ou save

        // depois de tudo isso, redireciona usuário com mensagem de êxito
        \Session::flash('mensagem', ['msg' => 'Registro atualizado com sucesso.', 
            'class'=>'teal lighten-2 white-text']);

        return redirect()->route('admin.tipos');
    }

    // exclui registro
    public function excluir($id)
    {
        // verifica antes se o tipo tem imovel relacionado
        if (Imovel::where('tipo_id', '=', $id)->count()) {
            $msg = "Não foi possível excluir tipo de imóvel. Há imóveis relacionados: ";
            $imoveis = Imovel::where('tipo_id', '=', $id)->get();
            foreach ($imoveis as $imovel) {
                $msg .= "# id: " . $imovel->id . " - título: " . $imovel->titulo . " ";
            }
            $msg .= "."; // finaliza mensagem com ponto final

            \Session::flash('mensagem', ['msg' => $msg, 
                'class'=>'red lighten-2 white-text']);

            return redirect()->route('admin.tipos');
        }

        // procura o id no banco e exclui
        Tipo::find($id)->delete();

        // depois, redireciona usuário com mensagem de êxito
        \Session::flash('mensagem', ['msg' => 'Registro excluído com êxito.', 'class'=>'teal lighten-2 white-text']);

        return redirect()->route('admin.tipos');
    }
}
