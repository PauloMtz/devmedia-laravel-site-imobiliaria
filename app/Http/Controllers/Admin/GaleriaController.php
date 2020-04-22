<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Galeria; // declara o model
use App\Imovel;

// php artisan make:controller Admin\GaleriaController

class GaleriaController extends Controller
{

	// lista galerias por imóvel
    public function index($id)
    {
    	// busca imóvel por id
    	$imovel = Imovel::find($id);

        // pega galerias
        //$registros = $imovel->galeria()->orderBy('ordem', 'asc')->get();
        $registros = $imovel->galeria;

        // envia os dados de $registros e $imovel para a view
        return view('admin.galerias.index', compact('registros', 'imovel'));
    }

    // carrega a página para adicionar imagem à galeria
    public function adicionar($id)
    {
        // a galeria será relacionada a um imóvel
        $imovel = Imovel::find($id);

        // envia os dados do $imovel para a view
        return view('admin.galerias.adicionar-galeria', compact('imovel'));
    }

    // salva os dados no bando quando o formulário for submetido
    public function salvar(Request $req, $id)
    {
        // a galeria será relacionada a um imóvel
        $imovel = Imovel::find($id);

        $dados = $req->all();

        if ($imovel->galeria()->count()) {
            $galeria = $imovel->galeria()->orderBy('ordem', 'desc')->first();
            $ordemAtual = $galeria->ordem;
        } else {
            $ordemAtual = 0;
        }

        if($req->hasFile('imagens')) {
            $arquivos = $req->file('imagens');

            foreach ($arquivos as $imagem) {
                $registro = new Galeria();

                $rand = rand(11111, 99999); // gera um número aleatório nessa faixa
                $diretorio = "img/imoveis/".str_slug($imovel->titulo, '_')."/";
                $extensao = $imagem->guessClientExtension(); // método do Laravel
                $nomeArquivo = "_img_".$rand.".".$extensao;
                $imagem->move($diretorio, $nomeArquivo);
                $registro->imovel_id = $imovel->id;
                $registro->ordem = $ordemAtual + 1;
                $ordemAtual++;
                $registro->imagem = $diretorio."/".$nomeArquivo;

                $registro->save();
            }
        }

        \Session::flash('mensagem', ['msg' => 'Registro salvo com sucesso.', 
            'class'=>'teal lighten-2 white-text']);

        return redirect()->route('admin.galerias', $imovel->id);
    }
    
}
