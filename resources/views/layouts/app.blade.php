<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', config('app.name', 'Delivery'))
    </title>

    {{-- Boxicons --}}
    <link
        href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
        rel="stylesheet"
    >

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')

</head>

<body class="mx-auto max-w-[1600px] px-4 py-8 sm:px-6 lg:px-8 bg-slate-100">

    {{-- NAVBAR --}}
    <nav class="fixed top-0 left-0 right-0 z-40 border-b border-slate-200 bg-white">

        <div class="mx-auto flex h-16 items-center justify-between px-6">

            {{-- Logo --}}
            <div class="flex items-center gap-3">

                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-600 text-white">
                    <i class='bx bx-store text-2xl'></i>
                </div>

                <div>
                    <h1 class="text-lg font-bold text-slate-800">
                        Delivery
                    </h1>

                    <p class="text-xs text-slate-500">
                        Gestão de pedidos
                    </p>
                </div>

            </div>


            {{-- MENU --}}
            <div class="hidden items-center gap-2 md:flex">

                <a
                    href="{{ route('dashboard') }}"
                    class="inline-flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-blue-600"
                >

                    <i class='bx bx-home-alt'></i>

                    Dashboard

                </a>


                <a
                    href="{{ route('cardapio.index') }}"
                    class="inline-flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-blue-600"
                >

                    <i class='bx bx-food-menu'></i>

                    Cardápio

                </a>


                <a
                    href="{{ route('pedidos.index') }}"
                    class="inline-flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-blue-600"
                >

                    <i class='bx bx-receipt'></i>

                    Pedidos

                </a>


                <a
                    href="#"
                    class="inline-flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-blue-600"
                >

                    <i class='bx bx-group'></i>

                    Clientes

                </a>

            </div>


            {{-- USUÁRIO --}}
            <div class="flex items-center gap-4">

                @auth

                    <div class="hidden text-right sm:block">

                        <p class="text-sm font-semibold text-slate-700">
                            {{ Auth::user()->name }}
                        </p>

                        <p class="text-xs text-slate-500">
                            Usuário
                        </p>

                    </div>


                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-100 text-blue-600"
                    >

                        <i class='bx bx-user text-xl'></i>

                    </div>


                    <form method="POST" action="{{ route('logout') }}">

                        @csrf

                        <button
                            type="submit"
                            class="flex h-9 w-9 items-center justify-center rounded-lg text-slate-500 transition hover:bg-red-50 hover:text-red-600"
                            title="Sair"
                        >

                            <i class='bx bx-log-out text-xl'></i>

                        </button>

                    </form>

                @endauth

            </div>

        </div>

    </nav>


    {{-- CONTEÚDO PRINCIPAL --}}

    <main class="pt-16">

        <div class="mx-auto max-w-7xl px-6 py-8">

            {{-- TÍTULO DA PÁGINA --}}

            @hasSection('page-title')

                <div class="mb-8">

                    <h2 class="text-3xl font-bold text-slate-800">

                        @yield('page-title')

                    </h2>

                    @hasSection('page-description')

                        <p class="mt-1 text-sm text-slate-500">

                            @yield('page-description')

                        </p>

                    @endif

                </div>

            @endif


            {{-- MENSAGEM DE SUCESSO --}}

            @if(session('success'))

                <div
                    class="mb-6 flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-emerald-700"
                >

                    <i class='bx bx-check-circle text-xl'></i>

                    <span class="text-sm font-medium">

                        {{ session('success') }}

                    </span>

                </div>

            @endif


            {{-- MENSAGEM DE ERRO --}}

            @if(session('error'))

                <div
                    class="mb-6 flex items-center gap-3 rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-red-700"
                >

                    <i class='bx bx-error-circle text-xl'></i>

                    <span class="text-sm font-medium">

                        {{ session('error') }}

                    </span>

                </div>

            @endif


            {{-- ERROS DE VALIDAÇÃO --}}

            @if($errors->any())

                <div
                    class="mb-6 rounded-xl border border-red-200 bg-red-50 p-5 text-red-700"
                >

                    <div class="flex items-center gap-2">

                        <i class='bx bx-error-circle text-xl'></i>

                        <h3 class="font-semibold">
                            Verifique os dados informados.
                        </h3>

                    </div>


                    <ul class="mt-2 list-inside list-disc text-sm">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- VIEW --}}

            @yield('content')

        </div>

    </main>


    @stack('scripts')

</body>

</html>