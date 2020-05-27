<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function papeis()
    {
        return $this->belongsToMany(Papel::class);
    }

    public function adicionaPapel($Papel)
    {
        // verifica se o objeto é uma string
        if(is_string($papel)) {
            // '$this' se refere a esta classe
            // 'papeis' é esse método acima
            return $this->papeis()->save(
                // busca o primeiro registro, ou falha [não salva]
                Papel::where('nome', '=', $papel)->firstOrFail()
            );
        }

        // se não for string [se for objeto]
        return $this->papeis->save(
            // busca o objeto para ter certeze de que ele existe
            // poderia ser apenas 'save($papel)' se tiver certeze de que ele existe
            Papel::where('nome', '=', $papel->nome)->firstOrFail()
        );
    }

    public function removerPapel($Papel)
    {
        // verifica se o objeto é uma string
        if(is_string($papel)) {
            // '$this' se refere a esta classe
            // 'papeis' é esse método acima
            return $this->papeis()->detach(
                // busca o primeiro registro, ou falha [não exclui]
                Papel::where('nome', '=', $papel)->firstOrFail()
            );
        }

        // se não for string [se for objeto]
        return $this->papeis->detach(
            // busca o objeto para ter certeze de que ele existe
            // poderia ser apenas 'detach($papel)' se tiver certeze de que ele existe
            Papel::where('nome', '=', $papel->nome)->firstOrFail()
        );
    }
}
