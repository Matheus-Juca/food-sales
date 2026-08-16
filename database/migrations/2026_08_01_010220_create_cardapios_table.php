<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cardapios', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade');

            $table->string('nome_item', 100);
            $table->string('descricao', 255 )->nullable();
            $table->decimal('preco', 10, 2);
            $table->string('categoria', 50);
            $table->boolean('disponivel')->default(true);
            $table->string('imagem')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cardapio');
    }
};
