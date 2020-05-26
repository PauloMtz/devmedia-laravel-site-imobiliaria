<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{
    protected $fillable = [
    	'nome', 'descricao'
    ];

    public function papeis()
    {
    	// return $this->belongsToMany('App\Papel');
    	return $this->belongsToMany(Papel::class); // são a mesma coisa
    }
}
