<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests;
use App\Imovel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $imoveis = Imovel::orderBy('id', 'desc')->paginate(1);
        return view('site.home', compact('imoveis'));
    }
}
