<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Necessario validação da migration completa
     */
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();

           
            $table->foreignId('cliente_id')
            ->constrained('clientes')
            ->nullable()
            ->cascadeOnDelete();
            
            $table->decimal('total', 10, 2)->default(0);

          $table->string('status', 30)->default('pendente');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
