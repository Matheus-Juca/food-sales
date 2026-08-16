<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Combo extends Model
{
    protected $fillable = [
        'user_id',
        'nome_combo',
        'descricao',
        'preco',
        'disponivel',
    ];

    public function itens()
    {
        return $this->hasMany(ComboItem::class);
    }

    
}
