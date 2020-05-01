<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imovel;

class ImovelController extends Controller
{
    public function index($id)
    {
    	$imovel = Imovel::find($id);
        return view('site.imovel', compact('imovel'));
    }
}
