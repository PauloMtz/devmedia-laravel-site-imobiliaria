<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    // relacionamento /app/Imovel
    // relacionamento /migrations/create_imoveis_table
    public function imoveis() 
    {
    	return $this->hasMany('App\Imovel', 'cidade_id'); 
    }
}
