<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cardapio extends Model
{
    protected $table = 'cardapios';

    protected $fillable = [
        'user_id',
        'nome_item',
        'descricao',
        'preco',
        'categoria',
        'disponivel',
        'imagem',
    ];

    public function comboItens()
{
    return $this->hasMany(ComboItem::class);
}
}
