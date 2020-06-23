<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    // indicando qual tabela do banco de dados o model Card ira representar
    protected $table = 'cards';
    // indicando quais colunas da tabela cards queremos trabalhar, seja,
    // para inserir registros, ou, para alterar registros.
    protected $fillable = [
        'title', 'content'
    ];
}
