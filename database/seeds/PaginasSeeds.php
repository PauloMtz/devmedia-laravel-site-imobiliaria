<?php

use Illuminate\Database\Seeder;
use App\Pagina; // declarar utilização do model

class PaginasSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // verificar se existe uma página já criada
        $existe = Pagina::where('tipo', '=', 'sobre')->count();

        if ($existe) {
        	$paginaSobre = Pagina::where('tipo', '=', 'sobre')->first();
        } else {
        	// se não existir -> cria
        	$paginaSobre = new Pagina();
        }

        // implementação dos dados para gravação
        $paginaSobre->titulo = 'A empresa';
        $paginaSobre->descricao = 'Breve descrição sobre a empresa.';
        $paginaSobre->texto = 'Um texto qualquer sobre a empresa.';
        $paginaSobre->imagem = 'img/apartment.jpg';
        $paginaSobre->tipo = 'sobre';

        // salvar no banco
        $paginaSobre->save();

        // para dar uma mensagem de retorno para o usuário
        echo "Pagina sobre criada com sucesso!";

        // ------------------ x -------------------- x -------------------

        // verificar se existe uma página já criada
        $existe = Pagina::where('tipo', '=', 'contato')->count();

        if ($existe) {
            $paginaContato = Pagina::where('tipo', '=', 'contato')->first();
        } else {
            // se não existir -> cria
            $paginaContato = new Pagina();
        }

        // implementação dos dados para gravação
        $paginaContato->titulo = 'Entre em contato';
        $paginaContato->descricao = 'Preencha o formulário';
        $paginaContato->texto = 'Contato';
        $paginaContato->imagem = 'img/apartment.jpg';
        $paginaContato->email = 'acessopepa@gmail.com';
        $paginaContato->tipo = 'contato';

        // salvar no banco
        $paginaContato->save();

        // para dar uma mensagem de retorno para o usuário
        echo "Pagina de contato criada com sucesso!";
    }
}
