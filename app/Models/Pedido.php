<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PedidoItem;
use App\Models\Cliente;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pedido extends Model
{
    protected $fillable = [
        'cliente_id',
        'total',
        'status',
        
    ];

    public function itens()
    {
        return $this->hasMany(PedidoItem::class);
    }
}
