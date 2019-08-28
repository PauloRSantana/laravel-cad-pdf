<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arquivo extends Model
{
    protected $fillable = [
        'tipo_arquivo',
        'nome_arquivo',
        'dsc_arquivo',
        'num_arquivo',
        'dat_arquivo',
        'imagem',
        'dat_inclusao',
        'dat_alteracao'
    ];
}
