@extends('layouts.app')

@section('title', 'Pedidos')

@section('page-title', 'Gerenciamento de pedidos')

@section('content')

    <section class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-4 mb-8">




        {{--- Quantidade  ---}}
        <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-200">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Pedidos abertos
                    </p>

                    <h2 class="mt-2 text-3xl font-bold text-green-600">
                      
                    </h2>

                    <span class="mt-2 inline-flex rounded-full bg-green-100 px-2 py-1 text-xs font-semibold text-green-600">
                        +4% este mês
                    </span>
                </div>

                <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-green-100">
                    <i class='bx bx-box text-2xl text-green-800'></i>
                </div>

            </div>

        </div>

        {{--- Complementos cadastrados ---}}
        <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-200">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Pedidos finalizados
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

        {{--- Variação de vendas ---}}
        <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-200">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Total de pedidos mês
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



                    <tr class="border-t hover:bg-slate-50">

                        <td class="px-6 py-4">
                           
                        </td>

                        <td class="px-6 py-4">
                           
                        </td>

                        <td class="px-6 py-4">
                        
                        </td>

                        <td class="px-6 py-4 text-right">



                            <span class="font-semibold text-emerald-600">
                                R$ 
                            </span>




                        </td>

                    </tr>

           
                    <tr>

                        <td colspan="4" class="py-8 text-center text-slate-500">

                            Nenhum pedido cadastrado até o momento.
                        </td>

                    </tr>

                  
                </tbody>

            </table>
            <div class="border-t border-slate-200 p-4">

            </div>
        </div>

    </section>

@endsection