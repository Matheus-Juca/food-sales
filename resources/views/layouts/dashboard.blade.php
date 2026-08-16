@extends('layouts.app')

@section('title', 'Dashboard')

@section('page-title', 'DelyRap')

@section('content')

<div class="space-y8 mb-5">

    <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

        <div>

            <h2 class="text-2xl font-bold text-slate-800 mb-4"> 
                Principais indicadores
            </h2>
        </div>
    </div>


     <section class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-4 mb-8">

 


            {{--- Quantidade  ---}}
         <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-200">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Quantidade de pedidos abertos
                    </p>

                    <h2 class="mt-2 text-3xl font-bold text-green-600">
                        
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

            {{--- Itens em estoque ---}}
        <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-200">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Itens em estoque
                    </p>

                    <h2 class="mt-2 text-3xl font-bold text-sky-600">
                    
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

            {{--- Financeiro ---}}
        <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-200">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Faturamento do mês
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






















@endsection