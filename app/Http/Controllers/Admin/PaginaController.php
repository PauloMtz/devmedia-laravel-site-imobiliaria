<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pagina; // declara o model

class PaginaController extends Controller
{
    public function index()
    {
        // pega as páginas no banco
        $pagina = Pagina::all();

        // envia os dados para a view
        return view('admin.paginas.index', compact('pagina'));
    }

    public function editar($id)
    {
        // pega as informações referentes àquele id
        $pagina = Pagina::find($id);

        // envia dados para a view
        return view('admin.paginas.editar', compact('pagina'));
    }

    public function atualizar(Request $request, $id)
    {
        $dados = $request->all();
        $pagina = Pagina::find($id);

        // pega os dados do formulário
        $pagina->titulo = trim($dados['titulo']);
        $pagina->descricao = trim($dados['descricao']);
        $pagina->texto = trim($dados['texto']);

        if (isset($dados['email'])) {
            $pagina->email = trim($dados['email']);
        }
        
        if (isset($dados['mapa']) && trim($dados['mapa']) != '') {
            $pagina->mapa = trim($dados['mapa']);
        } else {
            $pagina->mapa = null;
        }

        // tratamento da imagem
        $file = $request->file('imagem');
        if($file) {
            $rand = rand(11111, 99999); // gera um número aleatório nessa faixa
            $diretorio = "img/paginas/".$id."/";
            $extensao = $file->guessClientExtension(); // método do Laravel
            $nomeArquivo = "_img_".$rand.".".$extensao;
            $file->move($diretorio, $nomeArquivo);
            $pagina->imagem = $diretorio."/".$nomeArquivo;
        }

        // atualiza os dados
        $pagina->update(); // pode ser update ou save

        // redireciona usuário com mensagem de êxito
        \Session::flash('mensagem', ['msg' => 'Registro atualizado com sucesso.', 'class'=>'teal lighten-2 white-text']);
        return redirect()->route('admin.paginas');
    }
}
