<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Imovel; // declara o model
use App\Tipo;
use App\Cidade;

class ImovelController extends Controller
{
    public function index()
    {
        // pega os imóveis no banco
        $registros = Imovel::all();

        // envia os dados para a view
        return view('admin.imoveis.index', compact('registros'));
    }

    // carrega a página de inserção
    public function adicionar()
    {
    	// enviar variáveis para a view
    	$tipos = Tipo::all();
    	$cidades = Cidade::all();

        return view('admin.imoveis.adicionar-imovel', compact('tipos', 'cidades'));
    }

    // salva os dados no bando quando o formulário for submetido
    public function salvar(Request $req)
    {
        $dados = $req->all();

        $registro = new Imovel();
        $registro->titulo = $dados['titulo'];
        $registro->descricao = $dados['descricao'];
        $registro->imagem = $dados['imagem'];
        $registro->status = $dados['status'];
        $registro->endereco = $dados['endereco'];
        $registro->cep = $dados['cep'];
        $registro->valor = $dados['valor'];
        $registro->dormitorios = $dados['dormitorios'];
        $registro->detalhes = $dados['detalhes'];
        $registro->visualizacoes = 0;
        $registro->publicar = $dados['publicar'];
        if (isset($dados['mapa']) && trim($dados['mapa']) != '') {
            $registro->mapa = trim($dados['mapa']);
        } else {
            $registro->mapa = null;
        }
        $registro->cidade_id = $dados['cidade_id'];
        $registro->tipo_id = $dados['tipo_id'];

        // tratamento da imagem
        $file = $req->file('imagem');
        if($file) {
            $rand = rand(11111, 99999); // gera um número aleatório nessa faixa
            $diretorio = "img/imoveis/".str_slug($dados['titulo'], '_')."/";
            $extensao = $file->guessClientExtension(); // método do Laravel
            $nomeArquivo = "_img_".$rand.".".$extensao;
            $file->move($diretorio, $nomeArquivo);
            $registro->imagem = $diretorio."/".$nomeArquivo;
        }

        $registro->save();

        \Session::flash('mensagem', ['msg' => 'Registro salvo com sucesso.', 
            'class'=>'teal lighten-2 white-text']);

        return redirect()->route('admin.imoveis');
    }

    public function editar($id)
    {
        // pega as informações referentes àquele id
        $registro = Imovel::find($id);
        $tipos = Tipo::all();
    	$cidades = Cidade::all();

        return view('admin.imoveis.editar-imovel', compact('registro','tipos', 'cidades'));
    }

    public function atualizar(Request $request, $id)
    {
        $registro = Imovel::find($id);
        $dados = $request->all();

        $registro->titulo = $dados['titulo'];
        $registro->descricao = $dados['descricao'];
        $registro->imagem = $dados['imagem'];
        $registro->status = $dados['status'];
        $registro->endereco = $dados['endereco'];
        $registro->cep = $dados['cep'];
        $registro->valor = $dados['valor'];
        $registro->dormitorios = $dados['dormitorios'];
        $registro->detalhes = $dados['detalhes'];
        $registro->publicar = $dados['publicar'];
        if (isset($dados['mapa']) && trim($dados['mapa']) != '') {
            $registro->mapa = trim($dados['mapa']);
        } else {
            $registro->mapa = null;
        }
        $registro->cidade_id = $dados['cidade_id'];
        $registro->tipo_id = $dados['tipo_id'];

        // tratamento da imagem
        $file = $request->file('imagem');
        if($file) {
            $rand = rand(11111, 99999); // gera um número aleatório nessa faixa
            $diretorio = "img/imoveis/".str_slug($dados['titulo'], '_')."/";
            $extensao = $file->guessClientExtension(); // método do Laravel
            $nomeArquivo = "_img_".$rand.".".$extensao;
            $file->move($diretorio, $nomeArquivo);
            $registro->imagem = $diretorio."/".$nomeArquivo;
        }

        // atualiza os dados
        $registro->update(); // pode ser update ou save

        // redireciona usuário com mensagem de êxito
        \Session::flash('mensagem', ['msg' => 'Registro atualizado com sucesso.', 'class'=>'teal lighten-2 white-text']);
        return redirect()->route('admin.imoveis');
    }

    // exclui registro
    public function excluir($id)
    {
        // procura o id no banco e exclui
        Imovel::find($id)->delete();

        // depois, redireciona usuário com mensagem de êxito
        \Session::flash('mensagem', ['msg' => 'Registro excluído com êxito.', 'class'=>'teal lighten-2 white-text']);

        return redirect()->route('admin.imoveis');
    }
}
