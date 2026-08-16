<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pedido;
use App\Models\Cardapio;
use App\Models\Combo;
use App\Models\Cliente;


class PedidosController extends Controller
{
    public function index()
    {
        return view('layouts.pedidos');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string|max:20',
            'endereco' => 'required|string|max:255',

            'itens_pedido' => 'required|array',

            'itens_pedido.*.tipo' => 'required|string|in:cardapio,combo',

            'itens_pedido.*.id' => 'required|integer',

            'itens_pedido.*.quantidade' => 'required|integer|min:1',
        ]);


        /*
    |--------------------------------------------------------------------------
    | 1. Criar ou localizar cliente
    |--------------------------------------------------------------------------
    */

        $cliente = Cliente::firstOrCreate(
            [
                'telefone' => $validatedData['telefone'],
            ],
            [
                'nome' => $validatedData['nome'],
                'endereco' => $validatedData['endereco'],
                'qtd_pedidos' => 0,
            ]
        );


        /*
    |--------------------------------------------------------------------------
    | 2. Criar pedido
    |--------------------------------------------------------------------------
    */

        $pedido = Pedido::create([
            'cliente_id' => $cliente->id,
            'total' => 0,
            'status' => 'pendente',
        ]);


        /*
    |--------------------------------------------------------------------------
    | 3. Criar itens do pedido
    |--------------------------------------------------------------------------
    */

        $total = 0;


        foreach ($validatedData['itens_pedido'] as $item) {

            if ($item['tipo'] === 'cardapio') {

                $produto = Cardapio::where('id', $item['id'])
                    ->where('user_id', auth()->id())
                    ->firstOrFail();


                $pedido->itens()->create([
                    'cardapio_id' => $produto->id,
                    'combo_id' => null,
                    'quantidade' => $item['quantidade'],
                    'preco_unitario' => $produto->preco,
                ]);


                $total += $produto->preco * $item['quantidade'];
            }


            if ($item['tipo'] === 'combo') {

                $combo = Combo::where('id', $item['id'])
                    ->where('user_id', auth()->id())
                    ->firstOrFail();


                $pedido->itens()->create([
                    'cardapio_id' => null,
                    'combo_id' => $combo->id,
                    'quantidade' => $item['quantidade'],
                    'preco_unitario' => $combo->preco,
                ]);


                $total += $combo->preco * $item['quantidade'];
            }
        }


        /*
    |--------------------------------------------------------------------------
    | 4. Atualizar total do pedido
    |--------------------------------------------------------------------------
    */

        $pedido->update([
            'total' => $total,
        ]);


        /*
    |--------------------------------------------------------------------------
    | 5. Atualizar quantidade de pedidos do cliente
    |--------------------------------------------------------------------------
    */

        $cliente->increment('qtd_pedidos');


        /*
    |--------------------------------------------------------------------------
    | 6. Finalizar
    |--------------------------------------------------------------------------
    */

        return redirect()
            ->route('sales.index')
            ->with('success', 'Pedido realizado com sucesso!');
    }
}
