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
        Schema::create('seguimiento_entrevistas', function (Blueprint $table) {
            $table->foreignId('id_entrevista')->constrained('entrevistas');
            $table->foreignId('id_pregunta')->constrained('preguntas');
            $table->string('respuesta');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();

            $table->primary(['id_entrevista', 'id_pregunta']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguimiento_entrevistas');
    }
};
