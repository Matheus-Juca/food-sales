<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CardapioController;
use App\Http\Controllers\ComboController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\PedidosController;


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Dashboard route

Route::get('/dashboard', [DashboardController::class, 'index'])
->name('dashboard');

// Cardapio route

Route::get('/cardapio', [CardapioController::class, 'index'])
->name('cardapio.index');

Route::post('/cardapio', [CardapioController::class, 'store'])
->name('cardapio.store');

Route::get('/pedidos', [App\Http\Controllers\PedidosController::class, 'index'])
->name('pedidos.index');


Route::get('/combos', [ComboController::class, 'index'])
->name('combos.index');

Route::post('/combos', [ComboController::class, 'store'])
->name('combos.store');

Route::get('/sales', [SalesController::class, 'index'])
->name('sales.index');

Route::post('/sales', [PedidosController::class, 'store'])
->name('sales.store');



require __DIR__.'/auth.php';
