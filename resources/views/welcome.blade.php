<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Minha Lanchonete</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-slate-100 text-slate-800">

<div
    x-data="{
        categoriaSelecionada: 'todos',
        carrinho: [],
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

        },

        totalItens() {

            return this.carrinho.reduce(
                (total, item) => total + item.quantidade,
                0
            );

        },

        totalCarrinho() {

            return this.carrinho.reduce(
                (total, item) =>
                    total + (item.preco * item.quantidade),
                0
            );

        }
    }"
>

    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}

    <header class="sticky top-0 z-40 border-b border-slate-200 bg-white/95 backdrop-blur">

        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6">

            {{-- Logo / Nome --}}
            <div class="flex items-center gap-3">

                <div
                    class="flex h-11 w-11 items-center justify-center rounded-2xl bg-emerald-600 text-white shadow-sm">

                    <i class='bx bx-restaurant text-2xl'></i>

                </div>

                <div>

                    <h1 class="text-lg font-bold text-slate-900 sm:text-xl">
                        Minha Lanchonete
                    </h1>

                    <p class="hidden text-xs text-slate-500 sm:block">
                        Faça seu pedido online
                    </p>

                </div>

            </div>


            {{-- Carrinho --}}
            <button
                type="button"
                @click="carrinhoAberto = true"
                class="relative flex items-center gap-2 rounded-2xl bg-emerald-600 px-4 py-3 font-semibold text-white shadow-sm transition hover:bg-emerald-700 active:scale-95">

                <i class='bx bx-cart text-xl'></i>

                <span class="hidden sm:inline">
                    Carrinho
                </span>

                <span
                    x-show="totalItens() > 0"
                    x-cloak
                    class="flex min-w-6 items-center justify-center rounded-full bg-white px-1.5 py-0.5 text-xs font-bold text-emerald-700"
                    x-text="totalItens()">
                </span>

            </button>

        </div>

    </header>


    {{-- ========================================================= --}}
    {{-- CONTEÚDO --}}
    {{-- ========================================================= --}}

    <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 sm:py-8">


        {{-- ===================================================== --}}
        {{-- BANNER --}}
        {{-- ===================================================== --}}

        <section class="relative overflow-hidden rounded-3xl bg-orange-700 px-6 py-8 text-white shadow-sm sm:px-10 sm:py-10">

            {{-- Elementos decorativos --}}
            <div class="absolute -right-16 -top-16 h-40 w-40 rounded-full bg-white/10"></div>

            <div class="absolute -bottom-20 right-20 h-48 w-48 rounded-full bg-white/5"></div>


            <div class="relative max-w-2xl">

                <span
                    class="inline-flex items-center gap-2 rounded-full bg-white/15 px-3 py-1 text-xs font-semibold backdrop-blur">

                    <i class='bx bx-store'></i>

                    Pedido online

                </span>


                <h2 class="mt-4 text-3xl font-extrabold leading-tight sm:text-4xl">

                    Seu pedido,
                    <span class="text-emerald-300">
                        do seu jeito.
                    </span>

                </h2>


                <p class="mt-3 max-w-xl text-sm leading-6 text-emerald-50 sm:text-base">

                    Escolha seus produtos favoritos, monte seu pedido
                    e receba tudo com praticidade.

                </p>

                

            </div>

        </section>


        {{-- ===================================================== --}}
        {{-- TÍTULO --}}
        {{-- ===================================================== --}}

        <div class="mt-8">

            <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-end">

                <div>

                    <p class="text-sm font-semibold uppercase tracking-wider text-emerald-600">
                        Cardápio
                    </p>

                    <h2 class="mt-1 text-3xl font-extrabold text-slate-900">
                        O que você vai pedir?
                    </h2>

                    <p class="mt-2 text-sm text-slate-500">
                        Escolha seus produtos e monte seu pedido.
                    </p>

                </div>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- CATEGORIAS --}}
        {{-- ===================================================== --}}

        <div class="mt-6 flex gap-3 overflow-x-auto pb-2">

            {{-- Todos --}}
            <button
                type="button"
                @click="categoriaSelecionada = 'todos'"
                class="flex shrink-0 items-center gap-2 rounded-full px-5 py-3 text-sm font-semibold transition"
                :class="categoriaSelecionada === 'todos'
                    ? 'bg-emerald-600 text-white shadow-sm'
                    : 'bg-white text-slate-600 shadow-sm hover:bg-slate-50'">

                <i class='bx bx-grid-alt'></i>

                Todos

            </button>


            {{-- Lanches --}}
            <button
                type="button"
                @click="categoriaSelecionada = 'lanche'"
                class="flex shrink-0 items-center gap-2 rounded-full px-5 py-3 text-sm font-semibold transition"
                :class="categoriaSelecionada === 'lanche'
                    ? 'bg-emerald-600 text-white shadow-sm'
                    : 'bg-white text-slate-600 shadow-sm hover:bg-slate-50'">

                <i class='bx bx-food-menu'></i>

                Lanches

            </button>


            {{-- Bebidas --}}
            <button
                type="button"
                @click="categoriaSelecionada = 'bebida'"
                class="flex shrink-0 items-center gap-2 rounded-full px-5 py-3 text-sm font-semibold transition"
                :class="categoriaSelecionada === 'bebida'
                    ? 'bg-emerald-600 text-white shadow-sm'
                    : 'bg-white text-slate-600 shadow-sm hover:bg-slate-50'">

                <i class='bx bx-drink'></i>

                Bebidas

            </button>

        </div>


        {{-- ===================================================== --}}
        {{-- PRODUTOS --}}
        {{-- ===================================================== --}}

        <section class="mt-8">

            <div class="mb-4 flex items-center justify-between">

                <div>

                    <h3 class="text-xl font-bold text-slate-900">
                        Nossos produtos
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        Escolha seus favoritos
                    </p>

                </div>

            </div>


            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                @foreach($itensCardapio as $item)

                <article
                    x-show="
                        categoriaSelecionada === 'todos'
                        || categoriaSelecionada === '{{ $item->categoria }}'
                    "
                    x-transition
                    class="group overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">


                    {{-- Imagem --}}
                    <div class="relative h-52 overflow-hidden bg-slate-200">

                        @if($item->imagem)

                        <img
                            src="{{ asset('storage/' . $item->imagem) }}"
                            alt="{{ $item->nome_item }}"
                            class="h-full w-full object-cover transition duration-500 group-hover:scale-105">

                        @else

                        <div class="flex h-full items-center justify-center">

                            <i class='bx bx-image text-6xl text-slate-400'></i>

                        </div>

                        @endif


                        {{-- Categoria --}}
                        <div class="absolute left-3 top-3">

                            <span
                                class="rounded-full bg-white/90 px-3 py-1.5 text-xs font-semibold capitalize text-slate-700 shadow-sm backdrop-blur">

                                {{ $item->categoria }}

                            </span>

                        </div>

                    </div>


                    {{-- Informações --}}
                    <div class="p-5">

                        <h4 class="text-lg font-bold text-slate-900">
                            {{ $item->nome_item }}
                        </h4>


                        @if($item->descricao)

                        <p class="mt-2 line-clamp-2 text-sm leading-5 text-slate-500">
                            {{ $item->descricao }}
                        </p>

                        @endif


                        <div class="mt-5 flex items-center justify-between gap-3">

                            <div>

                                <span class="text-xs text-slate-400">
                                    A partir de
                                </span>

                                <p class="text-xl font-extrabold text-emerald-600">

                                    R$
                                    {{ number_format($item->preco, 2, ',', '.') }}

                                </p>

                            </div>


                            <button
                                type="button"
                                @click="adicionarProduto({
                                    id: {{ $item->id }},
                                    nome: @js($item->nome_item),
                                    preco: {{ $item->preco }},
                                    tipo: 'produto'
                                })"
                                class="flex items-center gap-2 rounded-xl bg-emerald-600 px-4 py-3 text-sm font-bold text-white transition hover:bg-emerald-700 active:scale-95">

                                <i class='bx bx-plus text-lg'></i>

                                Adicionar

                            </button>

                        </div>

                    </div>

                </article>

                @endforeach

            </div>

        </section>


        {{-- ===================================================== --}}
        {{-- COMBOS --}}
        {{-- ===================================================== --}}

        <section class="mt-12">

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


            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">

                @foreach($combos as $combo)

                <article
                    class="relative overflow-hidden rounded-3xl border border-amber-100 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">

                    {{-- Destaque --}}
                    <div class="absolute right-0 top-0">

                        <div
                            class="rounded-bl-2xl bg-amber-400 px-4 py-2 text-xs font-extrabold text-amber-950">

                            COMBO

                        </div>

                    </div>


                    <div class="pr-16">

                        <h4 class="text-xl font-extrabold text-slate-900">
                            {{ $combo->nome_combo }}
                        </h4>

                    </div>


                    {{-- Itens --}}
                    <div class="mt-5 space-y-2">

                        @foreach($combo->itens as $item)

                        <div
                            class="flex items-center gap-2 text-sm text-slate-600">

                            <span
                                class="flex h-6 min-w-6 items-center justify-center rounded-md bg-emerald-50 px-1 text-xs font-bold text-emerald-600">

                                {{ $item->quantidade }}x

                            </span>

                            <span>
                                {{ $item->cardapio->nome_item }}
                            </span>

                        </div>

                        @endforeach

                    </div>


                    {{-- Descrição --}}
                    @if($combo->descricao)

                    <p class="mt-4 text-sm leading-5 text-slate-500">
                        {{ $combo->descricao }}
                    </p>

                    @endif


                    {{-- Preço --}}
                    <div class="mt-6 border-t border-slate-100 pt-5">

                        <div class="flex items-end justify-between gap-4">

                            <div>

                                <span class="text-xs text-slate-400">
                                    Combo por
                                </span>

                                <p class="text-2xl font-extrabold text-emerald-600">

                                    R$
                                    {{ number_format($combo->preco, 2, ',', '.') }}

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
                                class="rounded-xl bg-emerald-600 px-4 py-3 text-sm font-bold text-white transition hover:bg-emerald-700 active:scale-95">

                                <i class='bx bx-cart-add mr-1'></i>

                                Adicionar

                            </button>

                        </div>

                    </div>

                </article>

                @endforeach

            </div>

        </section>

    </main>


    {{-- ========================================================= --}}
    {{-- CARRINHO --}}
    {{-- ========================================================= --}}

    <div
        x-show="carrinhoAberto"
        x-cloak
        x-transition.opacity
        class="fixed inset-0 z-50">

        {{-- Fundo --}}
        <div
            class="absolute inset-0 bg-slate-950/50 backdrop-blur-sm"
            @click="carrinhoAberto = false">
        </div>


        {{-- Painel --}}
        <div
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            class="absolute right-0 top-0 flex h-full w-full max-w-md flex-col bg-white shadow-2xl">


            {{-- Header --}}
            <div class="flex items-center justify-between border-b border-slate-200 px-5 py-5">

                <div>

                    <div class="flex items-center gap-2">

                        <i class='bx bx-cart text-2xl text-emerald-600'></i>

                        <h2 class="text-xl font-bold text-slate-900">
                            Seu carrinho
                        </h2>

                    </div>

                    <p class="mt-1 text-sm text-slate-500">
                        Revise seu pedido
                    </p>

                </div>


                <button
                    type="button"
                    @click="carrinhoAberto = false"
                    class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-100 text-slate-600 transition hover:bg-slate-200">

                    <i class='bx bx-x text-2xl'></i>

                </button>

            </div>


            {{-- Produtos --}}
            <div class="flex-1 overflow-y-auto p-5">

                <template x-if="carrinho.length === 0">

                    <div class="py-20 text-center">

                        <div
                            class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-slate-100">

                            <i class='bx bx-cart text-4xl text-slate-300'></i>

                        </div>

                        <p class="mt-5 font-semibold text-slate-700">
                            Seu carrinho está vazio
                        </p>

                        <p class="mt-1 text-sm text-slate-400">
                            Adicione algum produto para começar.
                        </p>

                    </div>

                </template>


                <div class="space-y-3">

                    <template
                        x-for="item in carrinho"
                        :key="item.tipo + '-' + item.id">

                        <div
                            class="rounded-2xl border border-slate-200 bg-slate-50 p-4">

                            <div class="flex items-start justify-between">

                                <div>

                                    <div class="flex items-center gap-2">

                                        <h3
                                            class="font-bold text-slate-800"
                                            x-text="item.nome">
                                        </h3>

                                        <span
                                            class="rounded-full bg-emerald-100 px-2 py-0.5 text-[10px] font-bold uppercase text-emerald-700"
                                            x-text="item.tipo === 'combo' ? 'Combo' : 'Produto'">
                                        </span>

                                    </div>


                                    <p
                                        class="mt-1 text-sm font-semibold text-emerald-600"
                                        x-text="'R$ ' + Number(item.preco).toFixed(2).replace('.', ',')">
                                    </p>

                                </div>


                                {{-- Remover --}}
                                <button
                                    type="button"
                                    @click="carrinho = carrinho.filter(
                                        produto =>
                                            !(produto.id === item.id &&
                                            produto.tipo === item.tipo)
                                    )"
                                    class="text-slate-400 transition hover:text-red-500">

                                    <i class='bx bx-trash text-lg'></i>

                                </button>

                            </div>


                            {{-- Quantidade --}}
                            <div class="mt-4 flex items-center justify-between">

                                <div class="flex items-center gap-2 rounded-xl bg-white p-1 shadow-sm">

                                    <button
                                        type="button"
                                        @click="item.quantidade > 1
                                            ? item.quantidade--
                                            : carrinho = carrinho.filter(
                                                produto =>
                                                    !(produto.id === item.id &&
                                                    produto.tipo === item.tipo)
                                            )"
                                        class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-600 transition hover:bg-slate-100">

                                        <i class='bx bx-minus'></i>

                                    </button>


                                    <span
                                        class="w-8 text-center text-sm font-bold"
                                        x-text="item.quantidade">
                                    </span>


                                    <button
                                        type="button"
                                        @click="item.quantidade++"
                                        class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-600 transition hover:bg-slate-100">

                                        <i class='bx bx-plus'></i>

                                    </button>

                                </div>


                                {{-- Subtotal --}}
                                <strong
                                    class="text-sm font-bold text-slate-800"
                                    x-text="'R$ ' + (item.preco * item.quantidade).toFixed(2).replace('.', ',')">
                                </strong>

                            </div>

                        </div>

                    </template>

                </div>

            </div>


            {{-- Footer --}}
            <div class="border-t border-slate-200 bg-white p-5">

                <div class="mb-4 flex items-center justify-between">

                    <div>

                        <span class="text-sm text-slate-500">
                            Total do pedido
                        </span>

                        <p class="text-xs text-slate-400">
                            <span x-text="totalItens()"></span>
                            item(ns)
                        </p>

                    </div>


                    <strong
                        class="text-2xl font-extrabold text-emerald-600"
                        x-text="'R$ ' + totalCarrinho().toFixed(2).replace('.', ',')">
                    </strong>

                </div>


                <button
                    type="button"
                    :disabled="carrinho.length === 0"
                    class="flex w-full items-center justify-center gap-2 rounded-2xl bg-emerald-600 px-4 py-4 font-bold text-white transition hover:bg-emerald-700 disabled:cursor-not-allowed disabled:bg-slate-300">

                    Continuar pedido

                    <i class='bx bx-right-arrow-alt text-xl'></i>

                </button>

            </div>

        </div>

    </div>

</div>

</body>

</html>