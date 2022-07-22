<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name', 80)->index()->comment('Nome do Produto');
            $table->text('description')->nullable()->comment('Descrição do Produto');
            $table->string('sku', 36)->unique()->index()->comment('Identificador Único do Produto');
            $table->decimal('price', 15, 2)->nullable()->comment('Valor do Produto com 2 Casas Decimais');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
};
