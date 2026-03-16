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
        Schema::create('registro', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->time('hora');
            $table->string('tipo', 50);
            $table->foreignId('funcionario_id')->constrained('funcionario')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registro', function (Blueprint $table) {
            $table->dropForeign(['funcionario_id']); 
        });

        Schema::dropIfExists('registro');
    }
};
