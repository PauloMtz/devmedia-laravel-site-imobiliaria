<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests;
use App\Imovel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slide;

class HomeController extends Controller
{
    public function index()
    {
        $imoveis = Imovel::orderBy('id', 'desc')->paginate(1);
        $slides = Slide::where('publicado', '=', 'sim')->orderBy('ordem')->get();
        $direcaoSlide = ['center-align', 'left-align', 'right-align'];

        return view('site.home', compact('imoveis', 'slides', 'direcaoSlide'));
    }
}
