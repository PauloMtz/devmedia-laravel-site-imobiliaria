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

    public function adicionarPermissao($permissao)
    {
    	// '$this' se refere a esta classe
        // 'permissoes' é esse método acima
    	return $this->permissoes()->save($permissao);
    }

    public function removerPermissao($permissao)
    {
    	return $this->permissoes()->detach($permissao);
    }
}
