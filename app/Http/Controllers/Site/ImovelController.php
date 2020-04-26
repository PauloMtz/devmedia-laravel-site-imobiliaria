<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImovelController extends Controller
{
    public function index()
    {
        return view('site.imovel');
    }
}
