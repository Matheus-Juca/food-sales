<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ComboItem extends Model
{
    protected $fillable = [
        'combo_id',
        'cardapio_id',
        'quantidade',
    ];

    public function combo()
    {
        return $this->belongsTo(Combo::class);
    }

    public function cardapio()
    {
        return $this->belongsTo(Cardapio::class);
    }
}
