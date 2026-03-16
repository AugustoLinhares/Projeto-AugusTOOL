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
        Schema::create('funcionario', function (Blueprint $table) {
            $table->id();
            $table->string('foto', 300)->nullable();
            $table->string('nome', 100);
            $table->string('cpf', 20);
            $table->date('data_nasc');
            $table->time('carga_diaria');
            $table->integer('carga_semanal');
            $table->time('entrada');
            $table->time('saida');
            $table->string('email', 100)->nullable();
            $table->string('setor', 100)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionario');
    }
};
