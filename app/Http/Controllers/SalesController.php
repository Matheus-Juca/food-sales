<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComboItem;
use App\Models\Cardapio;
use App\Models\Combo;

class SalesController extends Controller
{
    public function index()
    {
        $itensCombo = ComboItem::whereHas('combo', function ($query) {
            $query->where('user_id', auth()->id());
        })->get();

         $itensCardapio = Cardapio::where('user_id', auth()->id())
            ->where('disponivel', true)
            ->orderBy('nome_item')
            ->get();

            $combos = Combo::where('user_id', auth()->id())
            ->orderBy('nome_combo')
            ->get();

        return view('layouts.sales', compact('itensCombo', 'itensCardapio', 'combos'));
    }
}
