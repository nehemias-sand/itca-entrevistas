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
        Schema::create('seguimiento_catalogo_ciclos', function (Blueprint $table) {
            $table->foreignId('id_catalogo')->constrained('catalogo_preguntas');
            $table->foreignId('id_ciclo')->constrained('ciclo_estudios');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();

            $table->primary(['id_catalogo', 'id_ciclo']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguimiento_catalogo_ciclos');
    }
};
