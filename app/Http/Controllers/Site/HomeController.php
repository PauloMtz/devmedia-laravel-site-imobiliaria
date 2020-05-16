<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests;
use App\Imovel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slide;
use App\Tipo;
use App\Cidade;

class HomeController extends Controller
{
    public function index()
    {
        $imoveis = Imovel::where('publicar', '=', 'sim')->orderBy('id', 'desc')->paginate(1);
        $slides = Slide::where('publicado', '=', 'sim')->orderBy('ordem')->get();
        $direcaoSlide = ['center-align', 'left-align', 'right-align'];

        $paginacao = true;

        $tipos = Tipo::orderBy('titulo')->get();
        $cidades = Cidade::orderBy('nome')->get();

        return view('site.home', compact('imoveis', 'slides', 'direcaoSlide', 'paginacao', 'tipos', 'cidades'));
    }

    public function busca(Request $request)
    {
    	$busca = $request->all();

    	$paginacao = false;

    	$tipos = Tipo::orderBy('titulo')->get();
        $cidades = Cidade::orderBy('nome')->get();

        // testa se houve seleção no campo 'status'
        if($busca['status'] == 'todos') {
        	$testeStatus = [
        		['status', '<>', null]
        	];
        } else {
        	$testeStatus = [
        		['status', '=', $busca['status']]
        	];
        }

        // testa se houve seleção no campo 'tipo'
        if($busca['tipo_id'] == 'todos') {
        	$testeTipo = [
        		['tipo_id', '<>', null]
        	];
        } else {
        	$testeTipo = [
        		['tipo_id', '=', $busca['tipo_id']]
        	];
        }

        // testa se houve seleção no campo 'cidade'
        if($busca['cidade_id'] == 'todos') {
        	$testeCidade = [
        		['cidade_id', '<>', null]
        	];
        } else {
        	$testeCidade = [
        		['cidade_id', '=', $busca['cidade_id']]
        	];
        }

        // dormitórios -> armazena em array
        $testeDorm = [
        	['dormitorios', '>=', 0],
        	['dormitorios', '=', 1],
        	['dormitorios', '=', 2],
        	['dormitorios', '=', 3],
        	['dormitorios', '>', 3],
        ];

        // pega o que o usuário digitou e joga em variável
        // como $busca[] é arrary, colocar array dentro de array na query
        $numDorm = $busca['dormitorios'];

        // campo de valores
        $testeValor = [
        	[['valor'], '>=', 0],
        	[['valor'], '<=', 500],
        	[['valor', '>', 500], ['valor', '<=', 1000]],
        	[['valor', '>', 1000], ['valor', '<=', 2000]],
        	[['valor', '>', 2000], ['valor', '<=', 5000]],
        	[['valor', '>', 5000], ['valor', '<=', 10000]],
        	[['valor', '>', 10000]]
        ];
        $numValor = $busca['valor'];

        // campo bairro
        if ($busca['bairro'] != '') {
        	$testeBairro = [
        		['endereco', 'like', '%' . $busca['bairro'] . '%']
        	];
        } else {
        	$testeBairro = [
        		['endereco', '<>', null]
        	];
        }

        $imoveis = Imovel::where('publicar', '=', 'sim')
        	->where($testeStatus)
        	->where($testeTipo)
        	->where($testeCidade)
        	->where([$testeDorm[$numDorm]])
        	->where($testeValor[$numValor])
        	->where($testeBairro)
        	->orderBy('id', 'desc')->get();

    	return view('site.busca', compact('busca', 'imoveis', 'paginacao', 'tipos', 'cidades'));
    }
}
