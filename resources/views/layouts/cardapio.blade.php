@extends('layouts.app')

@section('title', 'Cardapio')

@section('page-title', 'Gerenciamento de Cardapio')

@section('content')

<div class="space-y-8" x-data="{modal:null}">


    <div class="flex flex-wrap gap-3">

        {{-- Adicionar item ao cardapio --}}
        <button
            type="button"
            class="inline-flex items-center gap-2 rounded-xl bg-red-600 px-5 py-3 font-semibold text-white shadow-sm transition-all duration-200 hover:bg-red-700 hover:shadow-lg"
            @click="modal='cardapio'">

            <i class='bx bx-plus-circle text-xl'></i>

            Adicionar item ao cardapio

        </button>

        {{-- Criar combo --}}

        <button
            type="button"
            class="inline-flex items-center gap-2 rounded-xl bg-orange-600 px-5 py-3 font-semibold text-white shadow-sm transition-all duration-200 hover:bg-orange-700 hover:shadow-lg"
            @click="modal='combo'">

            <i class='bx bx-plus-circle text-xl'></i>

            Criar Combo

        </button>




    </div>

    <section class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-4 mb-8">




        {{--- Quantidade  ---}}
        <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-200">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Quantidade de combos cadastrados
                    </p>

                    <h2 class="mt-2 text-3xl font-bold text-green-600">
                        {{ $quantidadeCombos }}
                    </h2>

                    <span class="mt-2 inline-flex rounded-full bg-green-100 px-2 py-1 text-xs font-semibold text-green-600">
                        +4% este mês
                    </span>
                </div>

                <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-green-100">
                    <i class='bx bx-box text-3xl text-green-600'></i>
                </div>

            </div>

        </div>

        {{--- Complementos cadastrados ---}}
        <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-200">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Complementos cadastrados
                    </p>

                    <h2 class="mt-2 text-3xl font-bold text-sky-600">
                        {{ $itensCardapio->count() }}
                    </h2>

                    <span class="mt-2 inline-flex rounded-full bg-sky-100 px-2 py-1 text-xs font-semibold text-sky-600">
                        -4% este mês
                    </span>
                </div>

                <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-blue-100">
                    <i class='bx bx-trending-up text-3xl text-sky-600'></i>
                </div>



            </div>

        </div>

        {{--- Variação de vendas ---}}
        <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-200">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Variação de vendas
                    </p>

                    <h2 class="mt-2 text-3xl font-bold text-blue-600">

                    </h2>

                    <span class="mt-2 inline-flex rounded-full bg-blue-100 px-2 py-1 text-xs font-semibold text-blue-600">
                        +8%
                    </span>
                </div>

                <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-blue-100">
                    <i class='bx bx-wallet text-3xl text-sky-600'></i>
                </div>
            </div>

        </div>



    </section>



    <section class="rounded-2xl bg-white border border-slate-200 shadow-sm mt-8">

        <div class="border-b border-slate-200 p-6">

            <h3 class="text-lg font-bold">
                Combos cadastrados
            </h3>

        </div>

        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-slate-50">

                    <tr>

                        <th class="px-6 py-4 text-left text-sm font-semibold">
                            Nome do combo
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold">
                            Descrição
                        </th>

                        <th class="px-6 py-4 text-left text-sm font-semibold">
                            Itens do combo
                        </th>

                        <th class="px-6 py-4 text-right text-sm font-semibold">
                            Valor
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($combos as $combo)


                    <tr class="border-t hover:bg-slate-50">

                        <td class="px-6 py-4">
                            {{$combo->nome_combo}}
                        </td>

                        <td class="px-6 py-4">
                            {{$combo->descricao}}
                        </td>

                        <td class="px-6 py-4">
                            @foreach($combo->itens as $item)

                            <div>
                                {{ $item->quantidade }}x
                                {{ $item->cardapio->nome_item }}
                            </div>

                            @endforeach
                        </td>

                        <td class="px-6 py-4 text-right">



                            <span class="font-semibold text-emerald-600">
                                R$ {{$combo->preco}}
                            </span>




                        </td>

                    </tr>

                    @empty
                    <tr>

                        <td colspan="4" class="py-8 text-center text-slate-500">

                            Nenhum combo cadastrado ainda. Clique no botão "Criar Combo" para adicionar um novo combo.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>
            <div class="border-t border-slate-200 p-4">

            </div>
        </div>

    </section>


    {{--- Inicio codigo modal 1- cardapio / 2-combo ---}}

    <div x-show="modal === 'cardapio'" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">

        <div class="w-full max-w-lg rounded-2xl bg-white p-6 shadow-xl">

            <form action="{{ route('cardapio.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="flex items-center justify-between border-b border-slate-200 px-6 py-5">
                    <div>
                        <h2 class="text-xl font-bold text-slate-800">
                            Adicionar item no cardapio
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Cadastre um novo item no cardapio do sistema.
                        </p>
                    </div>

                    <button
                        type="button"
                        @click="modal = null"
                        class="flex h-9 w-9 items-center justify-center rounded-lg text-slate-500 transition hover:bg-red-50 hover:text-red-600">


                        <i class='bx bx-x text-2xl'> </i>

                    </button>


                </div>



                <div class="space-y-5 px-6 py-6">

                    <div>

                        <label for="nome" class="block text-sm font-medium text-slate-700">
                            Nome do item
                        </label>

                        <input
                            type="text"
                            name="nome_item"
                            id="nome"
                            placeholder="Ex: X-Burguer"
                            required
                            class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        <label for="categoria" class="block text-sm font-medium text-slate-700">Categoria</label>

                        <select
                            name="categoria"
                            id="categoria"
                            class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                            <option value="">Selecione uma categoria</option>
                            <option value="lanche">Lanche</option>
                            <option value="bebida">Bebida</option>
                            <option value="sobremesa">Sobremesa</option>
                            <option value="outros">Outros</option>
                        </select>



                        <label for="preco" class="block text-sm font-medium text-slate-700">Valor do item</label>
                        <input type="number" name="preco" id="preco" class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        <label for="imagem" class="block text-sm font-medium text-slate-700">Imagem do produto</label>
                        <input 
                        type="file"   
                        accept=".jpg,.jpeg,.png,.gif,.svg"  
                        name="imagem" 
                        id="imagem" 
                        class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">



                    </div>


                </div>
                <div class="flex justify-end gap-3 border-t border-slate-200 px-6 py-5">
                    <button
                        type="button"
                        @click="modal = null"
                        class="rounded-xl border border-slate-300 px-5 py-2 font-medium text-slate-700 hover:bg-slate-100">
                        Cancelar
                    </button>

                    <button
                        type="submit"
                        class="rounded-xl bg-emerald-600 px-5 py-2 font-medium text-white hover:bg-emerald-700">
                        Salvar Item
                    </button>
                </div>

            </form>
        </div>


    </div>



    <div x-show="modal == 'combo'" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">

        <div class="w-full max-w-lg rounded-2xl bg-white p-6 shadow-xl">

            <form action="{{ route('combos.store') }}" method="POST">

                @csrf

                <div class="flex items-center justify-between border-b border-slate-200 px-6 py-5">
                    <div>
                        <h2 class="text-xl font-bold text-slate-800">
                            Criar novo combo
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Crie um novo combo para sua lanchonete
                        </p>
                    </div>
                    <button
                        type="button"
                        @click="modal = null"
                        class="flex h-9 w-9 items-center justify-center rounded-lg text-slate-500 transition hover:bg-red-50 hover:text-red-600">


                        <i class='bx bx-x text-2xl'> </i>

                    </button>


                </div>

                <div class="mt-4">

                    <div class="mt-4">
                        <label for="valor" class="block text-sm font-medium text-slate-700">Nome do combo</label>
                        <input type="text" name="nome_combo" id="nome" class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">



                        <label for="valor" class="block text-sm font-medium text-slate-700">Itens do combo</label>

                        @foreach($itensCardapio as $item)

                        <div class="flex items-center justify-between rounded-lg border p-3">

                            <label class="flex items-center gap-3">

                                <input
                                    type="checkbox"
                                    name="itens[{{ $item->id }}][cardapio_id]"
                                    value="{{ $item->id }}"
                                    onchange="toggleQuantidade(this)">

                                {{ $item->nome_item }}

                                <span class="text-sm text-slate-500">
                                    R$ {{ number_format($item->preco, 2, ',', '.') }}
                                </span>

                            </label>

                            <input
                                type="number"
                                name="itens[{{ $item->id }}][quantidade]"
                                value="1"
                                min="1"
                                disabled
                                class="w-20 rounded-md border-slate-300">

                        </div>

                        @endforeach



                        <label for="descricao" class="mt-4 block text-sm font-medium text-slate-700">Descrição</label>
                        <input type="text" name="descricao" id="descricao" class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        <label for="valor" class="block text-sm font-medium text-slate-700">Preço</label>
                        <input type="number" name="preco" id="preco" class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">



                        <input
                            type="hidden"
                            name="tipo"
                            value="combo">
                    </div>


                </div>
                <div class="mt-8 flex justify-end gap-3 border-t border-slate-200 pt-5">
                    <button
                        type="button"
                        @click="modal = null"
                        class="rounded-xl border border-slate-300 px-5 py-2 font-medium text-slate-700 hover:bg-slate-100">
                        Cancelar
                    </button>

                    <button
                        type="submit"
                        class="rounded-xl bg-emerald-600 px-5 py-2 font-medium text-white hover:bg-emerald-700">
                        Salvar Combo
                    </button>
                </div>

            </form>
        </div>


    </div>

</div>


<script>
    function toggleQuantidade(checkbox) {

        const container = checkbox.closest('div');

        const quantidade = container.querySelector('input[type="number"]');

        quantidade.disabled = !checkbox.checked;

    }
</script>


@endsection