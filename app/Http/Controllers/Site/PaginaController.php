<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pagina; // declara o model Pagina

class PaginaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sobre()
    {
        // busca registro no banco
        $pagina = Pagina::where('tipo', '=', 'sobre')->first();
        //dd($pagina);

        // retorna a página sobre em:
        // resources/views/site/sobre.blade.php, enviando os dados de $pagina
        return view('site.sobre', compact('pagina'));
    }

    public function contato()
    {
        // busca registro no banco
        $pagina = Pagina::where('tipo', '=', 'contato')->first();
        //dd($pagina);

        // retorna a página sobre em:
        // resources/views/site/sobre.blade.php, enviando os dados de $pagina
        return view('site.contato', compact('pagina'));
    }

    public function contatoEnviar(Request $request)
    {
        $pagina = Pagina::where('tipo', '=', 'contato')->first();
        $email = $pagina->email;

        \Mail::send('emails.contato-template', ['request'=>$request], function($message) use ($request, $email) {
            $message->from($request['email'], $request['nome']); // email e nome são campos do formulário
            $message->replyTo($request['email'], $request['nome']);
            $message->To($email, 'Contato do site');
            $message->subject('Contato do site');
        });
        \Session::flash('mensagem', ['msg' => 'Mensagem enviada com sucesso.', 'class'=>'teal lighten-2 white-text']);
        return redirect()->route('site.contato');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
