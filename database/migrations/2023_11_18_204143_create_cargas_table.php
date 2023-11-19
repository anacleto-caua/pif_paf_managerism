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
        Schema::create('cargas', function (Blueprint $table) {
            $table->id();
            $table->integer("qtde_aves");
            $table->foreignId('produtor')->references('id')->on('users')->onDelete('cascade');;
            $table->string("sexo");
            $table->double('peso_medio_ave');
            $table->integer('aves_por_caixa');
            $table->date('data');
            $table->time('inicio_jejum');
            $table->time('horario');
            $table->string('turma_apanhado');
            $table->integer('dias_vida');
            $table->time('horario_previsto_entrega');
            $table->time('horario_previsto_inicio_abate');
            $table->integer('preferencia');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cargas');
    }
};
