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
        Schema::create('seguimiento_carrera_estudiantes', function (Blueprint $table) {
            $table->foreignId('id_seguimiento_carrera')->constrained('seguimiento_carreras');
            $table->foreignId('id_estudiante')->constrained('estudiantes');
            $table->boolean('activo')->default(true);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();

            $table->primary(['id_seguimiento_carrera', 'id_estudiante']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguimiento_carrera_estudiantes');
    }
};
