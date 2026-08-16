<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <link
        href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
        rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cardápio</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-slate-50 text-slate-800 bg-slate-200">


    <div
        x-data="{
        categoriaSelecionada: 'todos',
        carrinho: [],
        checkoutAberto: false,
        carrinhoAberto: false,
         
        adicionarProduto(item) {
            
        const existente = this.carrinho.find(
            produto =>
            produto.id === item.id &&
            produto.tipo === item.tipo
            );
            
            if (existente) {
                
            existente.quantidade++;
            
        } else {
            
            this.carrinho.push({
                ...item,
                quantidade: 1
            });
            
        }
        
        
        
        console.log(this.carrinho);
    }
}">


        {{-- Conteúdo --}}
        <main
            class="mx-auto max-w-[1600px] px-4 py-8 sm:px-6 lg:px-8">

            <div
                x-show="carrinhoAberto"
                x-cloak
                class="fixed inset-0 z-50">

                {{-- Fundo escuro --}}
                <div
                    class="absolute inset-0 bg-black/40"
                    @click="carrinhoAberto = false">
                </div>



                {{-- Painel carrinho --}}
                <div
                    class="absolute right-0 top-0 h-full w-full max-w-md bg-white shadow-xl">

                    {{-- Header --}}
                    <div class="flex items-center justify-between border-b p-5">

                        <div>
                            <h2 class="text-xl font-bold">
                                Seu carrinho
                            </h2>

                            <p class="text-sm text-slate-500">
                                Revise seu pedido
                            </p>
                        </div>

                        <button
                            type="button"
                            @click="carrinhoAberto = false"
                            class="flex h-9 w-9 items-center justify-center rounded-lg hover:bg-slate-100">

                            <i class='bx bx-x text-2xl'></i>

                        </button>

                    </div>


                    {{-- Produtos --}}
                    <div class="h-[calc(100%-180px)] overflow-y-auto p-5">

                        <template x-if="carrinho.length === 0">

                            <div class="py-16 text-center">

                                <i class='bx bx-cart text-5xl text-slate-300'></i>

                                <p class="mt-3 font-medium text-slate-600">
                                    Seu carrinho está vazio.
                                </p>

                                <p class="mt-1 text-sm text-slate-400">
                                    Adicione algum produto para começar.
                                </p>

                            </div>

                        </template>


                        <div class="space-y-4">

                            <template x-for="item in carrinho" :key="item.tipo + '-' + item.id">

                                <div class="rounded-xl border border-slate-200 p-4">

                                    <div class="flex items-start justify-between">

                                        <div>

                                            <h3
                                                class="font-semibold text-slate-800"
                                                x-text="item.nome">
                                            </h3>

                                            <p
                                                class="mt-1 text-sm text-emerald-600"
                                                x-text="'R$ ' + Number(item.preco).toFixed(2).replace('.', ',')">
                                            </p>

                                        </div>


                                        {{-- Remover --}}
                                        <button
                                            type="button"
                                            @click="carrinho = carrinho.filter(
                                    produto => !(produto.id === item.id && produto.tipo === item.tipo)
                                )"
                                            class="text-red-500 hover:text-red-700">
                                            Remover
                                            <i class='bx bx-trash'></i>

                                        </button>

                                    </div>


                                    {{-- Quantidade --}}
                                    <div class="mt-4 flex items-center justify-between">

                                        <div class="flex items-center gap-2">

                                            <button
                                                type="button"
                                                @click="item.quantidade > 1
                                        ? item.quantidade--
                                        : carrinho = carrinho.filter(
                                            produto => !(produto.id === item.id && produto.tipo === item.tipo)
                                        )"
                                                class="flex h-8 w-8 items-center justify-center rounded-lg border hover:bg-slate-100">

                                                <i class='bx bx-minus'></i>

                                            </button>


                                            <span
                                                class="w-8 text-center font-semibold"
                                                x-text="item.quantidade">
                                            </span>


                                            <button
                                                type="button"
                                                @click="item.quantidade++"
                                                class="flex h-8 w-8 items-center justify-center rounded-lg border hover:bg-slate-100">

                                                <i class='bx bx-plus'></i>

                                            </button>

                                        </div>


                                        {{-- Subtotal --}}
                                        <strong
                                            class="text-slate-800"
                                            x-text="'R$ ' + (item.preco * item.quantidade).toFixed(2).replace('.', ',')">
                                        </strong>

                                    </div>

                                </div>

                            </template>

                        </div>

                    </div>


                    {{-- Footer --}}
                    <div class="absolute bottom-0 left-0 right-0 border-t bg-white p-5">

                        <div class="mb-4 flex items-center justify-between">

                            <span class="font-medium text-slate-600">
                                Total
                            </span>

                            <strong
                                class="text-xl text-emerald-600"
                                x-text="'R$ ' + carrinho
                        .reduce((total, item) => total + (item.preco * item.quantidade), 0)
                        .toFixed(2)
                        .replace('.', ',')">
                            </strong>

                        </div>


                        <button
                            type="button"
                            @click="checkoutAberto = true"
                            class="w-full rounded-xl bg-emerald-600 px-4 py-3 font-semibold text-white hover:bg-emerald-700">

                            Continuar pedido

                        </button>

                    </div>

                </div>

            </div>











            {{-- Header // Colocado dentro do main para carregar a atualização do número de itens no carrinho --}}
            <header class="border-b shadow-sm">

                <div class="mx-auto flex max-w-[1600px] items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-8">

                    <div class="flex items-center gap-4">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-orange-600 text-white shadow-sm">
                            <i class='bx bx-store text-2xl'></i>
                        </div>

                        <div>

                            <h1 class="text-base font-bold sm:text-xl">
                                Minha Lanchonete
                            </h1>

                            <p class="hidden text-sm text-slate-500 sm:block">
                                Faça seu pedido online
                            </p>
                        </div>
                    </div>

                    <button
                        type="button"
                        @click="carrinhoAberto = true"
                        class="flex items-center gap-1.5 rounded-xl bg-orange-600 px-3 py-2.5 text-sm font-semibold text-white sm:gap-2 sm:px-4 sm:py-3 sm:text-base">

                        <i class='bx bx-cart text-xl'></i>

                        Carrinho

                        <span
                            class="rounded-full bg-white/20 px-2 py-0.5 text-sm"
                            x-text="carrinho.reduce((total, item) => total + item.quantidade, 0)">
                            0
                        </span>

                    </button>

                </div>

            </header>

            <section class="relative mb-10 overflow-hidden rounded-3xl bg-orange-700 px-5 py-10 text-white shadow-sm sm:px-8 sm:py-12 lg:px-12 lg:py-16">

                {{-- Elementos decorativos --}}
                <div class="absolute -right-16 -top-16 h-40 w-40 rounded-full bg-white/10"></div>

                <div class="absolute -bottom-20 right-20 h-48 w-48 rounded-full bg-white/5"></div>

                <div class="relative max-w-2xl">

                    <span
                        class="inline-flex items-center gap-2 rounded-full bg-black/15 px-3 py-1 text-xs font-semibold backdrop-blur">

                        <i class='bx bx-store'></i>

                        Pedido online

                    </span>

                    <h2 class="mt-4 text-3xl font-extrabold leading-tight sm:text-4xl">
                        Seu pedido,
                        <span class="text-esmerald-200">
                            do seu jeito
                        </span>


                    </h2>

                    <p class="mt-3 max-w-xl text-sm leading-6 text-emerald-50 sm:text-base">

                        Escolha seus produtos favoritos, monte seu pedido
                        e receba tudo com praticidade.

                    </p>
                </div>
            </section>



            {{-- Título --}}
            <div class="mb-6">

                <h2 class="text-2xl font-bold sm:text-3xl">
                    Nosso Cardápio
                </h2>

                <p class="mt-2 text-sm text-slate-500 sm:text-base">
                    Escolha seus produtos e monte seu pedido.
                </p>

            </div>


            {{-- Categorias --}}
            <div class="mt-6 flex gap-3 overflow-x-auto">

                <button
                    type="button"
                    @click="categoriaSelecionada = 'todos'"
                    class="rounded-full px-5 py-2 font-medium"
                    :class="categoriaSelecionada === 'todos'
            ? 'bg-orange-600 text-white'
            : 'bg-white text-slate-700 shadow-sm'">

                    Todos

                </button>


                <button
                    type="button"
                    @click="categoriaSelecionada = 'lanche'"
                    class="rounded-full px-5 py-2 font-medium"
                    :class="categoriaSelecionada === 'lanche'
            ? 'bg-orange-600 text-white'
            : 'bg-white text-slate-700 shadow-sm'">

                    Lanches

                </button>


                <button
                    type="button"
                    @click="categoriaSelecionada = 'bebida'"
                    class="rounded-full px-5 py-2 font-medium"
                    :class="categoriaSelecionada === 'bebida'
            ? 'bg-orange-600 text-white'
            : 'bg-white text-slate-700 shadow-sm'">

                    Bebidas

                </button>


            </div>


            {{-- Produtos --}}
            <section class="mt-8 mb-10">

                <h3 class="text-xl font-bold">
                    Lanches
                </h3>

                <div class="mt-4 grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                    @foreach($itensCardapio as $item)

                    <article
                        x-show="
                            categoriaSelecionada === 'todos'
                            || categoriaSelecionada === '{{ $item->categoria }}'
                        "
                        class="group overflow-hidden rounded-2xl bg-white shadow-sm transition duration-200 hover:-translate-y-1 hover:shadow-lg">
                        {{-- Imagem --}}
                        <div class="aspect-[4/3] bg-slate-200">

                            @if($item->imagem)

                            <img
                                src="{{ asset('storage/' . $item->imagem) }}"
                                alt="{{ $item->nome_item }}"
                                class="h-full w-full object-cover transition duration-300 group-hover:scale-105">

                            @else

                            <div class="flex h-full items-center justify-center">

                                <i class='bx bx-image text-5xl text-slate-400'></i>

                            </div>

                            @endif

                        </div>


                        {{-- Informações --}}
                        <div class="flex h-full flex-col p-5">

                            <h4 class="text-lg font-bold">
                                {{ $item->nome_item }}
                            </h4>

                            @if($item->descricao)

                            <p class="mt-1 text-sm text-slate-500">
                                {{ $item->descricao }}
                            </p>

                            @endif


                            <div class="mt-5 flex items-center justify-between">

                                <span class="text-lg font-bold text-red-800">
                                    R$ {{ number_format($item->preco, 2, ',', '.') }}
                                </span>

                                <button
                                    type="button"
                                    @click="adicionarProduto({
                                    id: {{ $item->id }},
                                    nome: @js($item->nome_item),
                                    preco: {{ $item->preco }},
                                    tipo: 'cardapio'
                                })"
                                    class="rounded-xl bg-orange-600 px-4 py-2 font-semibold text-white hover:bg-orange-700">

                                    <i class='bx bx-cart-add mr-1'></i>

                                    Adicionar

                                </button>
                            </div>

                        </div>

                    </article>

                    @endforeach

                </div>

            </section>


            {{-- Combos --}}
            <section class="mt-10 mb-10">

                <div class="mb-5">

                    <div class="flex items-center gap-3">

                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-100 text-amber-600">

                            <i class='bx bx-package text-xl'></i>

                        </div>

                        <div>

                            <h3 class="text-xl font-bold text-slate-900">
                                Combos
                            </h3>

                            <p class="text-sm text-slate-500">
                                Aproveite nossas combinações especiais
                            </p>

                        </div>

                    </div>

                </div>


                <div class="grid gap-5 sm:grid-cols-3 lg:grid-cols-4">

                    @foreach($combos as $combo)

                    <article class="relative overflow-hidden rounded-2xl border border-amber-100 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">

                        <div class="absolute right-0 top-0">

                            <div
                                class="rounded-bl-2xl bg-amber-500 px-4 py-2 text-xs font-extrabold text-amber-950">

                                COMBO

                            </div>

                        </div>


                        <div class="pr-16">

                            <h4 class="text-xl font-extrabold text-slate-900">
                                {{ $combo->nome_combo }}
                            </h4>

                        </div>


                        <!-- Itens do combo -->
                        <div class="mt-5 space-y-2">
                            @foreach($combo->itens as $item)

                            <div
                                class="flex items-center gap-2 text-sm text-slate-600">

                                <span
                                    class="flex h-6 min-w-6 items-center justify-center rounded-md bg-black-50 px-1 text-xs font-bold text-orange-600">

                                    {{ $item->quantidade }}x

                                </span>

                                <span>
                                    {{ $item->cardapio->nome_item }}
                                </span>
                            </div>
                            @endforeach
                        </div>

                        <!-- Descrição do combo -->
                        @if($combo->descricao)

                        <p class="mt-4 text-sm leading-5 text-slate-500">
                            {{ $combo->descricao }}
                        </p>

                        @endif



                        <div class="mt-6 border-t border-slate-100 pt-5">

                            <div>
                                <span class="text-xs text-slate-400">
                                    Combo por
                                </span>

                                <p class="text-lg font-bold text-red-700">
                                    R$ {{ number_format($combo->preco, 2, ',', '.') }}
                                </p>

                            </div>


                            <button
                                type="button"
                                @click="adicionarProduto({
                                id: {{ $combo->id }},
                                nome: @js($combo->nome_combo),
                                preco: {{ $combo->preco }},
                                tipo: 'combo'
                            })"
                                class="rounded-xl bg-orange-600 px-4 py-3 text-sm font-bold text-white transition hover:bg-orange-700 active:scale-95">


                                <i class='bx bx-cart-add mr-1'></i>

                                Adicionar

                            </button>

                        </div>

                    </article>

                    @endforeach

                </div>

            </section>

        </main>

    {{--- Checkout Modal --}}
        
        <div
            x-show="checkoutAberto"
            x-cloak
            class="fixed inset-0 z-50">
    
            {{-- Fundo --}}
            <div
                class="absolute inset-0 bg-black/40"
                @click="checkoutAberto = false">
            </div>
    
    
            {{-- Painel --}}
            <div
                class="absolute right-0 top-0 h-full w-full max-w-md overflow-y-auto bg-white shadow-xl">
    
                {{-- Header --}}
                <div class="flex items-center justify-between border-b p-5">
    
                    <div>
                        <h2 class="text-xl font-bold">
                            Finalizar pedido
                        </h2>
    
                        <p class="text-sm text-slate-500">
                            Informe seus dados
                        </p>
                    </div>
    
                    <button
                        type="button"
                        @click="checkoutAberto = false"
                        class="flex h-9 w-9 items-center justify-center rounded-lg hover:bg-slate-100">
    
                        <i class='bx bx-x text-2xl'></i>
    
                    </button>
    
                </div>
    
    
                {{-- Formulário --}}
                <form
                    method="POST"
                    action="{{ route('sales.store') }}"
                    class="space-y-5 p-5">
    
    
                    @csrf
    
                    {{-- Nome --}}
                    <div>
    
                        <label class="block text-sm font-medium text-slate-700">
                            Nome
                        </label>
    
                        <input
                            type="text"
                            name="nome"
                            required
                            class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:border-emerald-500">
    
                    </div>
    
    
                    {{-- Telefone --}}
                    <div>
    
                        <label class="block text-sm font-medium text-slate-700">
                            Telefone
                        </label>
    
                        <input
                            type="text"
                            name="telefone"
                            required
                            class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:border-emerald-500">
    
                    </div>
    
    
                    {{-- Endereço --}}
                    <div>
    
                        <label class="block text-sm font-medium text-slate-700">
                            Endereço
                        </label>
    
                        <textarea
                            name="endereco"
                            required
                            rows="3"
                            class="mt-2 w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:border-emerald-500"></textarea>
    
                    </div>
    
    
                    {{-- Aqui vamos colocar o carrinho --}}
                    <template
                        x-for="(item, index) in carrinho"
                        :key="item.tipo + '-' + item.id">
    
                        <div>
    
                            <input
                                type="hidden"
                                :name="'itens_pedido[' + index + '][id]'"
                                :value="item.id">
    
                            <input
                                type="hidden"
                                :name="'itens_pedido[' + index + '][tipo]'"
                                :value="item.tipo">
    
                            <input
                                type="hidden"
                                :name="'itens_pedido[' + index + '][quantidade]'"
                                :value="item.quantidade">
    
                        </div>
    
                    </template>
    
    
                    <button
                        type="submit"
                        class="w-full rounded-xl bg-orange-600 px-4 py-3 font-bold text-white hover:bg-orange-700">
    
                        Finalizar pedido
    
                    </button>
    
                </form>
    
            </div>
    
        </div>
    </div>





</body>

</html>