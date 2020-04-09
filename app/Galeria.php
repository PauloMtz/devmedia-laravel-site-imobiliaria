<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    // php artisan make:model Galeria -m
    // gera o model e a migration
    // após rodar o migrate [ ver migration ]
    // efetuar o relacionamento
    public function imovel()
    {
    	// relacioinar model com a chave estrangeira
    	return $this->belongsTo('App\Imovel', 'imovel_id');
    }
}
