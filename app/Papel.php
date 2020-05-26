<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Papel extends Model
{
    protected $fillable = [
    	'nome', 'descricao'
    ];

    public function permissoes()
    {
    	// return $this->belongsToMany('App\Papel');
    	return $this->belongsToMany(Permissao::class); // são a mesma coisa
    }
}
