<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cardapio;
use App\Models\ComboItem;
use App\Models\Combo;
use Illuminate\Support\Facades\Auth;


class CardapioController extends Controller
{
    public function index()
    {
        
// Itens do combo

        $itensCombo = ComboItem::whereHas('combo', function ($query) {
            $query->where('user_id', auth()->id());
        })->get();



//combos
        $quantidadeCombos = Combo::where('user_id', auth()->id())
            ->orderBy('nome_combo')
            ->count();

        $combos = Combo::where('user_id', auth()->id())
            ->with('itens.cardapio')
            ->orderBy('nome_combo')
            ->get();

//percorre quantidade de itens no cardapio cadastrados
        $itensCardapio = Cardapio::where('user_id', auth()->id())
            ->where('disponivel', true)
            ->orderBy('nome_item')
            ->get();

        return view('layouts.cardapio', compact('itensCardapio', 'combos', 'quantidadeCombos', 'itensCombo'));
    }

    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $validatedData = $request->validate([
            'nome_item' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
            'categoria' => 'required|string|max:255',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);

        if ($request->hasFile('imagem')) {

        $imagem = $request->file('imagem');

        $caminho = $imagem->store('cardapio', 'public');

        $validatedData['imagem'] = $caminho;
    }

    

        $validatedData['user_id'] = auth()->id();

        Cardapio::create($validatedData);

        // Redirecionar de volta para a página do cardápio com uma mensagem de sucesso
        return redirect()->back()->with('success', 'Item adicionado com sucesso!');
    }
}

