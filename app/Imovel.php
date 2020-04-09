<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
	// php artisan make:migration create_imoveis_table --create=imoveis
    protected $table = "imoveis";

    // relacionamento /migrations/create_imoveis_table
    public function tipo() 
    {
    	return $this->belongsTo('App\Tipo', 'tipo_id'); 
    }

    // relacionamento /migrations/create_imoveis_table
    public function cidade() 
    {
    	return $this->belongsTo('App\Cidade', 'cidade_id'); 
    }

    // relacionamento com o model Galeria
    public function galeria()
    {
        // relaciona com a chave estrangeira da tabela galerias
        return $this->belongsTo('App\Galeria', 'imovel_id');
    }
}
