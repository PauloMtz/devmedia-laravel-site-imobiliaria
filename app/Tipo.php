<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    // relacionamento /app/Imovel
    // relacionamento /migrations/create_imoveis_table
    public function imoveis() 
    {
    	return $this->hasMany('App\Imovel', 'tipo_id'); 
    }

    // depois de todas as configuracoes, rodar migracao
    // php artisan migrate
}
