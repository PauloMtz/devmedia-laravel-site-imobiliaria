<?php

use Illuminate\Database\Seeder;
use App\Permissao; // chama o model

class PermissaoSeeds extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan make:seed PermissaoSeeds
     * declara em DatabaseSeeder.php
     *
     * @return void
     */
    public function run()
    {
    	// permissão para listar usuarios
        if (!Permissao::where('nome', '=', 'usuario-listar')->count()) {
        	Permissao::create([
        		'nome' => 'usuario-listar',
        		'descricao' => 'Lista usuários'
        	]);
        } else {
        	$permissao = Permissao::where('nome', '=', 'usuario-listar')->first();
        	$permissao->update([
        		'nome' => 'usuario-listar',
        		'descricao' => 'Lista usuários'
        	]);
        }

        // permissão para adicionar usuarios
        if (!Permissao::where('nome', '=', 'usuario-adicionar')->count()) {
        	Permissao::create([
        		'nome' => 'usuario-adicionar',
        		'descricao' => 'Adiciona usuário'
        	]);
        } else {
        	$permissao = Permissao::where('nome', '=', 'usuario-adicionar')->first();
        	$permissao->update([
        		'nome' => 'usuario-adicionar',
        		'descricao' => 'Adiciona usuário'
        	]);
        }

        // permissão para editar usuarios
        if (!Permissao::where('nome', '=', 'usuario-editar')->count()) {
        	Permissao::create([
        		'nome' => 'usuario-editar',
        		'descricao' => 'Atualiza usuário'
        	]);
        } else {
        	$permissao = Permissao::where('nome', '=', 'usuario-editar')->first();
        	$permissao->update([
        		'nome' => 'usuario-editar',
        		'descricao' => 'Atualiza usuário'
        	]);
        }

        // permissão para excluir usuarios
        if (!Permissao::where('nome', '=', 'usuario-excluir')->count()) {
        	Permissao::create([
        		'nome' => 'usuario-excluir',
        		'descricao' => 'Remove usuário'
        	]);
        } else {
        	$permissao = Permissao::where('nome', '=', 'usuario-excluir')->first();
        	$permissao->update([
        		'nome' => 'usuario-excluir',
        		'descricao' => 'Remove usuário'
        	]);
        }
    }
}
