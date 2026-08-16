<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Combo;
use App\Models\ComboItem;

class ComboController extends Controller
{

    public function index()
    {
        $combos = Combo::where('user_id', auth()->id())
            ->orderBy('nome_combo')
            ->get();

        return view('layouts.cardapio', compact('combos'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $validatedData = $request->validate([
            'nome_combo' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:255',
            'preco' => 'required|numeric|min:0',

            'itens' => 'required|array',

            'itens.*.cardapio_id' => 'required|exists:cardapios,id',
            'itens.*.quantidade' => 'required|integer|min:1',
        ]);

        $validatedData['user_id'] = auth()->id();

        $combo = Combo::create([
            'user_id' => $validatedData['user_id'],
            'nome_combo' => $validatedData['nome_combo'],
            'descricao' => $validatedData['descricao'] ?? null,
            'preco' => $validatedData['preco'],
        ]);

       

        foreach ($validatedData['itens'] as $item) {

            $combo->itens()->create([
                'cardapio_id' => $item['cardapio_id'],
                'quantidade' => $item['quantidade'],
            ]);
        }

        return redirect()
            ->back()
            ->with('success', 'Combo criado com sucesso!');
    }
}
