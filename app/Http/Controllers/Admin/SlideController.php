<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Slide; // declara o model

// php artisan make:controller Admin\SlideController

class SlideController extends Controller
{
    // lista slides
    public function index()
    {
        // pega slides no banco
        $registros = Slide::orderBy('ordem', 'asc')->get();

        // envia os dados de $registros para a view
        return view('admin.slides.index', compact('registros'));
    }

    // carrega a página para adicionar slide
    public function adicionar()
    {
        // envia os dados do $imovel para a view
        return view('admin.slides.adicionar-slide');
    }

    // salva os dados no banco quando o formulário for submetido
    public function salvar(Request $req)
    {
        if (Slide::count()) {
            $slides = Slide::orderBy('ordem', 'desc')->first();
            $ordemAtual = $slides->ordem;
        } else {
            $ordemAtual = 0;
        }

        if($req->hasFile('imagens')) {
            $arquivos = $req->file('imagens');

            foreach ($arquivos as $imagem) {
                $registro = new Slide();

                $rand = rand(11111, 99999); // gera um número aleatório nessa faixa
                $diretorio = "img/slides/"; // onde ficarão as imagens para os slides
                $extensao = $imagem->guessClientExtension(); // método do Laravel
                $nomeArquivo = "_img_".$rand.".".$extensao;
                $imagem->move($diretorio, $nomeArquivo);
                $registro->ordem = $ordemAtual + 1;
                $ordemAtual++;
                $registro->imagem = $diretorio."/".$nomeArquivo;

                $registro->save();
            }
        }

        \Session::flash('mensagem', ['msg' => 'Registro salvo com sucesso.', 
            'class'=>'teal lighten-2 white-text']);

        return redirect()->route('admin.slides');
    }

    // carrega a página de edição de dados
    public function editar($id)
    {
        // pega as informações referentes àquele id
        $registro = Slide::find($id);

        return view('admin.slides.editar-slide', compact('registro'));
    }

    // atualiza os dados quando o formulário for submetido
    public function atualizar(Request $request, $id)
    {
        $registro = Slide::find($id);
        $dados = $request->all();

        $registro->titulo = $dados['titulo'];
        $registro->descricao = $dados['descricao'];
        $registro->link = $dados['link'];
        $registro->ordem = $dados['ordem'];
        $registro->publicado = $dados['publicado'];

        // tratamento da imagem
        $file = $request->file('imagem');
        if($file) {
            $rand = rand(11111, 99999); // gera um número aleatório nessa faixa
            $diretorio = "img/slides/";
            $extensao = $file->guessClientExtension(); // método do Laravel
            $nomeArquivo = "_img_".$rand.".".$extensao;
            $file->move($diretorio, $nomeArquivo);
            $registro->imagem = $diretorio."/".$nomeArquivo;
        }

        // atualiza os dados
        $registro->update(); // pode ser update ou save

        // redireciona usuário com mensagem de êxito
        \Session::flash('mensagem', ['msg' => 'Registro atualizado com sucesso.', 'class'=>'teal lighten-2 white-text']);
        return redirect()->route('admin.slides');
    }

    // exclui registro
    public function excluir($id)
    {
        // procura o id no banco
        $slide = Slide::find($id);

        // exclui registro
        $slide->delete();

        // depois, redireciona usuário com mensagem de êxito
        \Session::flash('mensagem', ['msg' => 'Registro excluído com êxito.', 'class'=>'teal lighten-2 white-text']);

        return redirect()->route('admin.slides');
    }
}
