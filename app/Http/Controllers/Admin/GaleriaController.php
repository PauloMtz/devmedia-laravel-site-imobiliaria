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
    
}
