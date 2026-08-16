<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PedidoItem extends Model
{
    protected $fillable = [
        'pedido_id',

        'cardapio_id',

        'combo_id',

        'quantidade',

        'preco_unitario',

    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    public function cardapio()
    {
        return $this->belongsTo(Cardapio::class);
    }
    
     public function combo()
    {
        return $this->belongsTo(Combo::class);
    }
}
