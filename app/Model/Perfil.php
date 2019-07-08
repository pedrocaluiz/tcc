<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected  $table = 'perfis';

    protected $fillable = [
        'descricao', 'administrador', 'ativo', 'usuarioAtualizacao',
    ];
}
